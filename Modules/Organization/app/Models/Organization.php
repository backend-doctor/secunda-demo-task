<?php

namespace Modules\Organization\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Activity\Models\Activity;
use Modules\Building\Models\Building;
use Modules\Organization\Database\Factories\OrganizationFactory;

class Organization extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return OrganizationFactory::new();
    }

    protected $casts = [
        'phones' => 'array',
    ];

    public function scopeGeoSquareFilter(Builder $query, float $lat1, float $lon1, float $lat2, float $lon2): Builder
    {
        return $query->whereHas('building', function ($query) use ($lat1, $lon1, $lat2, $lon2) {
            $query->where('latitude', '>=', $lat1)
                ->where('longitude', '>=', $lon1)
                ->where('latitude', '<=', $lat2)
                ->where('longitude', '<=', $lon2);
        });
    }

    public function scopeActivityNameFilter(Builder $query, string $activityName): Builder
    {
        return $query->whereHas('activity', function ($query) use ($activityName) {
            $query->where('name', $activityName);
        });
    }
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
