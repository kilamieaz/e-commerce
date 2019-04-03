<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserProfile;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'im.kilamieaz@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $user_profile = new UserProfile();
        $user_profile->user_id = $user->id;
        $user_profile->first_name = 'sultan';
        $user_profile->last_name = 'last';
        $user_profile->address = 'lorem ipsum';
        $user_profile->phone_number = '0820123';
        $user_profile->save();
    }
}
