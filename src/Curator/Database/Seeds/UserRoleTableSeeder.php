<?php

use Illuminate\Database\Seeder;
use Curator\Models;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the UserRole table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID for the SysAdmin user.
        $userID = Curator\Repositories\Models\User::select('id')
            ->where('username', 'James')
            ->first()
            ->id;

        //Get ID for the Super Administrator role.
        $roleID = Curator\Repositories\Models\Role::select('id')
            ->where('name', 'Super Administrator')
            ->first()
            ->id;

        //Insert the user / role relationship for the SysAdmin user.
        DB::table('user_role')->insert([
            'user_id' => $userID,
            'role_id' => $roleID
        ]);
    }
}
