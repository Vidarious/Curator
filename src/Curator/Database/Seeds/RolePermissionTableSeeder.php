<?php

use Illuminate\Database\Seeder;
use Curator\Models;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the Role Permission table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Get ID for the Administrator role.
        $role = Curator\Repositories\Models\Role::select('id')
            ->where('name', 'Administrator')
            ->first()
            ->id;

        //Get ID's of the permissions to grant to the Administrator role.
        $permissions = Curator\Repositories\Models\Permission::select('id')
            ->where('name', 'Admin')
            ->orWhere('name', 'Admin:Activity')
            ->orWhere('name', 'Admin:Users')
            ->orWhere('name', 'Admin:UsersCreate')
            ->orWhere('name', 'Admin:UsersEdit')
            ->orWhere('name', 'Admin:UsersDelete')
            ->orWhere('name', 'Admin:Permissions')
            ->orWhere('name', 'Admin:PermissionsCreate')
            ->orWhere('name', 'Admin:PermissionsEdit')
            ->orWhere('name', 'Admin:PermissionsDelete')
            ->orWhere('name', 'Admin:Roles')
            ->orWhere('name', 'Admin:RolesCreate')
            ->orWhere('name', 'Admin:RolesEdit')
            ->orWhere('name', 'Admin:RolesDelete')
            ->get();

        foreach($permissions as $permission)
        {
            $permissionsArray[] =
            [
                'role_id'       => $role,
                'permission_id' => $permission->id
            ];
        }

        //Insert the role / permission relationship for Administrators.
        DB::table('role_permission')->insert($permissionsArray);
    }
}
