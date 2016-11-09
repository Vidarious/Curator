<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the Activity table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID for the God Admin user.
        $userID = Curator\Repositories\Models\User::select('id')
            ->where('username', 'James')
            ->first()
            ->id;

        $activity = new Curator\Repositories\Models\Activity;

        $activity->user_id = $userID;
        $activity->action = 'Created SysAdmin user with Super Administrator permission. This user cannot be deleted.';
        $activity->ip_address = '127.0.0.1';

        //Insert record.
        $activity->save();
    }
}
