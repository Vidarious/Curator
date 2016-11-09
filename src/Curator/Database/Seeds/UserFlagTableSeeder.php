<?php
use Illuminate\Database\Seeder;

class UserFlagTableSeeder extends Seeder
{
    /**
     * Run the Flag table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID for the SysAdmin user.
        $userID = Curator\Repositories\Models\User::select('id')
            ->where('username', 'Vidarious')
            ->first()
            ->id;

        //Get ID for Password Reset.
        $flagID = Curator\Repositories\Models\Flag::select('id')
            ->where('name', 'Password_Reset')
            ->first()
            ->id;

        //Insert a list of system flags which can be assigned to users.
        //These are protected and cannot be deleted.
        DB::table('user_flag')->insert([
            'user_id' => $userID,
            'flag_id' => $flagID
        ]);
    }
}
