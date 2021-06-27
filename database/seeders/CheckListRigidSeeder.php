<?php

namespace Database\Seeders;

use App\Models\CheckListRigid;
use Illuminate\Database\Seeder;

class CheckListRigidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckListRigid::factory()
            ->count(5)
            ->create();
    }
}
