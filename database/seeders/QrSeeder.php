<?php

namespace Database\Seeders;

use App\Models\Qr;
use Illuminate\Database\Seeder;

class QrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qr::factory()
            ->count(5)
            ->create();
    }
}
