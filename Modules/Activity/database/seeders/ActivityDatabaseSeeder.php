<?php

namespace Modules\Activity\Database\Seeders;

use Modules\Activity\Models\Activity;
use Illuminate\Database\Seeder;

class ActivityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory(10)->create();
    }
}
