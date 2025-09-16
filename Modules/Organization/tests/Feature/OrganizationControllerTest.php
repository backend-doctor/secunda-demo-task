<?php

namespace Modules\Organization\Tests\Feature;

use Modules\Organization\Http\Resources\OrganizationResource;
use Modules\Activity\Models\Activity;
use Modules\Organization\Models\Organization;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }


    public function test_success_get_list_by_building(): void
    {
        $organizationId = 1;
        $assertData = OrganizationResource::collection(
            Organization::whereBuildingId($organizationId)->get()
        );
        $url = route('api.organizations.listByBuilding', ['buildingId' => $organizationId]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }

    public function test_success_get_list_by_activity(): void
    {
        $activityId = 1;
        $assertData = OrganizationResource::collection(
            Organization::whereActivityId($activityId)->get()
        );
        $url = route('api.organizations.listByActivity', ['activityId' => $activityId]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }

    public function test_success_get_list_by_geo_square(): void
    {
        $lat1 = 55.751244;
        $lon1 = 37.618423;
        $lat2 = $lat1 + 5.0000;
        $lon2 = $lon1 + 5.0000;
        $assertData = OrganizationResource::collection(
            Organization::geoSquareFilter($lat1, $lon1, $lat2, $lon2)->get()
        );
        $url = route('api.organizations.listByGeoSquare', ['lat1' => $lat1, 'lon1' => $lon1, 'lat2' => $lat2, 'lon2' => $lon2]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }


    public function test_success_get_by_id(): void
    {
        $organizationId = 1;
        $assertData = OrganizationResource::make(Organization::find($organizationId));
        $url = route('api.organizations.byId', ['organizationId' => $organizationId]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }


    public function test_success_get_by_name(): void
    {
        $organizationName = Organization::inRandomOrder()->first()->name;
        $assertData = OrganizationResource::make(Organization::whereName($organizationName)->first());
        $url = route('api.organizations.byName', ['organizationName' => $organizationName]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }


    public function test_success_get_list_by_activity_name(): void
    {
        $activityName = Activity::inRandomOrder()->first()->name;
        $assertData = OrganizationResource::collection(
            Organization::activityNameFilter($activityName)->get()
        );
        $url = route('api.organizations.listByActivityName', ['activityName' => $activityName]);
        $response = $this->get($url);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => $assertData->toArray(request: request()),
        ]);
    }
}
