<?php

namespace Modules\Organization\Service;

use Modules\Organization\Models\Organization;
use Modules\Organization\Repository\OrganizationRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class OrganizationService
{
    public function __construct(private readonly OrganizationRepository $organizationRepository) {}
    /**
     * List organizations by activity name
     * @param string $activityName
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function listByActivityName(string $activityName, ?int $page = 1, ?int $perPage = 10): LengthAwarePaginator
    {
        return $this->organizationRepository->listByActivityName($activityName, $page, $perPage);
    }

    /**
     * List organizations by geo square
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function listByGeoSquare(float $lat1, float $lon1, float $lat2, float $lon2, ?int $page = 1, ?int $perPage = 10): LengthAwarePaginator
    {
        return $this->organizationRepository->listByGeoSquare($lat1, $lon1, $lat2, $lon2, $page, $perPage);
    }

    /**
     * List organizations by building id
     * @param int $buildingId
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function listByActivity(int $activityId, int $page, int $perPage): LengthAwarePaginator
    {
        return $this->organizationRepository->listByActivity($activityId, $page, $perPage);
    }

    /**
     * List organizations by building id
     * @param int $buildingId
     * @param int $page
     * @param int $perPage
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function listByBuilding(int $buildingId, int $page, int $perPage): LengthAwarePaginator
    {
        return $this->organizationRepository->listByBuilding($buildingId, $page, $perPage);
    }

    /**
     * Get organization by id
     * @param int $organizationId
     * @return Organization
     * @throws \Exception
     */
    public function byId(int $organizationId): Organization
    {
        return $this->organizationRepository->byId($organizationId);
    }

    /**
     * Get organization by name
     * @param string $organizationName
     * @return Organization
     * @throws \Exception
     */
    public function byName(string $organizationName): Organization
    {
        return $this->organizationRepository->byName($organizationName);
    }
}
