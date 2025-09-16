<?php

namespace Modules\Organization\Database\Factories;

use Modules\Activity\Models\Activity;
use Modules\Building\Models\Building;
use Modules\Organization\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Organization\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $buildingId = Building::count() > 0
            ? Building::inRandomOrder()->first()->id
            : Building::factory()->create()->id;
        $activityId = Activity::count() > 0
            ? Activity::inRandomOrder()->first()->id
            : Activity::factory()->create()->id;
        return [
            'name' => $this->faker->company,
            'phones' => [
                $this->faker->phoneNumber,
                $this->faker->phoneNumber,
            ],
            'building_id' => $buildingId,
            'activity_id' => $activityId,
        ];
    }
}
