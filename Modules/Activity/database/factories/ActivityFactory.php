<?php

namespace Modules\Activity\Database\Factories;

use Modules\Activity\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Activity\Models\Activity>
 */
class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentId = Activity::inRandomOrder()->first()?->id;
        return [
            'name' => fake()->name,
            'parent_id' => $parentId,
        ];
    }
}
