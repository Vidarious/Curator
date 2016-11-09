<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the User table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID for the Protected status.
        $statusID = Curator\Repositories\Models\Status::select('id')
            ->where('name', 'Protected')
            ->first()
            ->id;

        $user = new Curator\Repositories\Models\User;

        $user->email = 'jasfd@asfd.com';
        $user->username = 'James';
        $user->password = Hash::make('thefnb');
        $user->given_name = 'af';
        $user->family_name = 'asf';
        $user->status_id = $statusID;

        //Insert record.
        $user->save();

    }
}
