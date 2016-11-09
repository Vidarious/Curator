<?php

use Illuminate\Database\Seeder;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the Flag table seeds.
     *
     * @return void
     */
    public function run()
    {
        $flag = new Curator\Repositories\Models\Flag;

        $flag->name = 'Password_Reset';

        $flag->save();
    }
}
