<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zakir Hossen',
            'email' => 'web.zakirbd@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        
        $profile = Profile::create([
            'user_id' => $user->id,
            'role_id' => 1,
        ]);
    }
}
