<?php

use Illuminate\Database\Seeder;
use Curator\Models;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the Setting table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID of the role which will be set as the default role for new users.
        $roleID = Curator\Repositories\Models\Role::select('id')
            ->where('name', 'Generic')
            ->first()
            ->id;

        //Insert the default settings for the Curator application.
        DB::table('settings')->insert([
            'login_method'              => 'Username',
            'remember_me'               => TRUE,
            'login_throttling'          => TRUE,
            'login_throttling_attempts' => 5,
            'login_throttling_lockout'  => 60,
            'user_idle_time'            => 15,
            'default_role_id'           => $roleID,
            'login_page'                => '/'
        ]);
    }
}
