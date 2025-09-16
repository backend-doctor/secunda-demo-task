<?php

namespace Modules\Organization\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Organization\Http\Resources\OrganizationResource;
use Modules\Organization\Service\OrganizationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct(private readonly OrganizationService $organizationService) {}
    /**
     * List organizations by building id
     * @param \Illuminate\Http\Request $request
     * @response array{data: OrganizationResource[]}
     * @return OrganizationResource[]
     */
    public function listByBuilding(int $buildingId, Request $request): JsonResponse
    {
        $organizations = $this->organizationService->listByBuilding($buildingId, $request->input('page', 1), $request->input('perPage', 10));
        return OrganizationResource::collection($organizations)
            ->response();
    }

    /**
     * List organizations by activity id
     * @param \Illuminate\Http\Request $request
     * @response array{data: OrganizationResource[]}
     * @return OrganizationResource[]
     */
    public function listByActivity(int $activityId, Request $request): JsonResponse
    {
        $organizations = $this->organizationService->listByActivity($activityId, $request->input('page', 1), $request->input('perPage', 10));
        return OrganizationResource::collection($organizations)
            ->response();
    }

    /**
     * List organizations by geo square
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param \Illuminate\Http\Request $request
     * @response array{data: OrganizationResource[]}
     * @return OrganizationResource[]
     */
    public function listByGeoSquare(float $lat1, float $lon1, float $lat2, float $lon2, Request $request): JsonResponse
    {
        $organizations = $this->organizationService->listByGeoSquare($lat1, $lon1, $lat2, $lon2, $request->input('page', 1), $request->input('perPage', 10));
        return OrganizationResource::collection($organizations)
            ->response();
    }

    /**
     * Get organization by id
     * @param int $organizationId
     * @response array{data: OrganizationResource}
     * @return OrganizationResource
     */
    public function byId(int $organizationId): JsonResponse
    {
        $organization = $this->organizationService->byId($organizationId);
        return OrganizationResource::make($organization)
            ->response();
    }

    /**
     * Get organization by name
     * @param string $organizationName
     * @response array{data: OrganizationResource}
     * @return OrganizationResource
     */
    public function byName(string $organizationName): JsonResponse
    {
        $organization = $this->organizationService->byName($organizationName);
        return OrganizationResource::make($organization)
            ->response();
    }

    /**
     * List organizations by activity name
     * @param string $activityName
     * @param \Illuminate\Http\Request $request
     * @response array{data: OrganizationResource[]}
     * @return OrganizationResource[]
     */
    public function listByActivityName(string $activityName, Request $request): JsonResponse
    {
        $organizations = $this->organizationService->listByActivityName($activityName, $request->input('page', 1), $request->input('perPage', 10));
        return OrganizationResource::collection($organizations)
            ->response();
    }
}
