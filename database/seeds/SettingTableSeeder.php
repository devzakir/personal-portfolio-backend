<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Example',
            'copyright' => 'Copyright &copy; Example 2020',
            'phone' => '+880 1794 1724 79',
            'email' => 'web.zakirbd@gmail.com',
            'address' => 'Adabor, Dhaka-1207, Bangladesh',
            'resume' => 'https://bit.ly/2UWh0Ka',
            'facebook' => 'https://facebook.com/devzakir',
            'github' => 'https://github.com/devzakir',
            'linkedin' => 'https://linkedin.com/in/devzakir',
            'quora' => 'https://www.quora.com/profile/Zakir-Hossen-16',
            'skype' => 'https://join.skype.com/invite/mpMcvg2NWxdD',
            'stackoverflow' => 'https://stackoverflow.com/users/9127475/devzakir',
        ]);
    }
}
