<?php

namespace Database\Seeders;

use App\Models\Tanker;
use Illuminate\Database\Seeder;

class TankerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tanker::factory()
            ->count(5)
            ->create();
    }
}
