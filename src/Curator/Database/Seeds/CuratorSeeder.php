<?php

use Illuminate\Database\Seeder;

class CuratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Run Curator's seeds.
        $this->call(StatusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(FlagsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserFlagTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
    }
}
