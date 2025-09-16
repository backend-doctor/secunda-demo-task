<?php

namespace Modules\Activity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Activity\Database\Factories\ActivityFactory;

class Activity extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ActivityFactory::new();
    }
    protected static function booted()
    {
        static::saving(function (self $activity) {
            $activity->validateCountChildren(3);
        });
    }
    private function validateCountChildren(int $maxLevel, ?int $level = 1)
    {
        if ($level > $maxLevel) {
            throw new \Exception('Nesting cannot be more than three levels.');
        }
        $child = $this->children;
        if ($child) {
            $this->check($child, $maxLevel, $level + 1);
        }
    }

    public function scopeParentFilter(Builder $query, int $parentId): Builder
    {
        return $query->where('parent_id', $parentId);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'parent_id')
            ->with('parent');
    }

    public function children(): HasOne
    {
        return $this->hasOne(Activity::class, 'parent_id')
            ->with('children');
    }
}
