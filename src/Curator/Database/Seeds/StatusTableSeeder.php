<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the Status table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert a list of system status's which can be assigned to users.
        //All but 'Protected' can be assigned to users as this status
        //is reserved for the parent Super Administrator account.
        DB::table('status')->insert([
            [
                'name' => 'Enabled'
            ],
            [
                'name' => 'Disabled'
            ],
            [
                'name' => 'Banned'
            ],
            [
                'name' => 'Protected'
            ]
        ]);
    }
}
