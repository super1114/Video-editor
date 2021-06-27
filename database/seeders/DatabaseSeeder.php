<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(TankerSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(LogSeeder::class);
        $this->call(HireSeeder::class);
        $this->call(QrSeeder::class);
        $this->call(CheckListRigidSeeder::class);
        $this->call(CheckListNrSeeder::class);
    }
}
