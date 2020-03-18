<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\UserRole::create([
            'name' => 'Super Admin',
            'role_id' => 1,
        ]);

        App\UserRole::create([
            'name' => 'User',
            'role_id' => 0,
        ]);
    }
}
