<?php

namespace Modules\Building\Database\Seeders;

use Modules\Building\Models\Building;
use Illuminate\Database\Seeder;

class BuildingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Building::factory(10)->create();
    }
}
