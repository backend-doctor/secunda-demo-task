<?php

namespace Modules\Organization\Database\Seeders;

use Modules\Organization\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::factory(20)->create();
    }
}
