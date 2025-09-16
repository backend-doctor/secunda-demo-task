<?php

namespace Modules\Organization\Repository;

use Modules\Organization\Models\Organization;
use Illuminate\Pagination\LengthAwarePaginator;

class OrganizationRepository
{
    public function listByActivityName(string $activityName, int $page, int $perPage): LengthAwarePaginator
    {
        return Organization::query()
            ->activityNameFilter($activityName)
            ->paginate(
                page: $page,
                perPage: $perPage
            );
    }

    public function listByGeoSquare(float $lat1, float $lon1, float $lat2, float $lon2, int $page, int $perPage): LengthAwarePaginator
    {
        return Organization::query()
            ->geoSquareFilter($lat1, $lon1, $lat2, $lon2)
            ->paginate(
                page: $page,
                perPage: $perPage
            );
    }

    public function listByActivity(int $activityId, int $page, int $perPage): LengthAwarePaginator
    {
        return Organization::query()
            ->where('activity_id', $activityId)
            ->paginate(
                page: $page,
                perPage: $perPage
            );
    }

    public function byId(int $id): Organization
    {
        return Organization::query()
            ->where('id', $id)
            ->first();
    }

    public function byName(string $name): Organization
    {
        return Organization::query()
            ->where('name', $name)
            ->first();
    }
    public function listByBuilding(int $buildingId, int $page, int $perPage): LengthAwarePaginator
    {
        return Organization::query()
            ->where('building_id', $buildingId)
            ->paginate(
                page: $page,
                perPage: $perPage
            );
    }
}
