<?php

namespace Database\Seeders;

use App\Models\CheckListNr;
use Illuminate\Database\Seeder;

class CheckListNrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckListNr::factory()
            ->count(5)
            ->create();
    }
}
