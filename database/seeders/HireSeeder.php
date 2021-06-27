<?php

namespace Database\Seeders;

use App\Models\Hire;
use Illuminate\Database\Seeder;

class HireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hire::factory()
            ->count(5)
            ->create();
    }
}
