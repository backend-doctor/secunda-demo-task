<?php

namespace Modules\Building\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Building\Database\Factories\BuildingFactory;

class Building extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return BuildingFactory::new();
    }
}
