<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the Permissions table seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert a list of system permissions which can be assigned to roles and users.
        //These are protected and cannot be deleted.
        DB::table('permissions')->insert([
            [
                'name' => 'Admin',
                'description'    => 'Grants the user or role administrative rights.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:CreateAdmin',
                'description'    => 'Grants administrators the ability to create other administrators.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:Activity',
                'description'    => 'Grants administrators access to the User Activity section.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:Users',
                'description'    => 'Grants administrators access to list and view all users.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:UsersCreate',
                'description'    => 'Grants administrators the ability to create other users.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:UsersEdit',
                'description'    => 'Grants administrators the ability to edit user details (non-administrators only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:UsersUniquePermissions',
                'description'    => 'Grants administrators the ability to assign users unique permissions.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:UsersDelete',
                'description'    => 'Grants administrators the ability to delete other users (non-administrators only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:Roles',
                'description'    => 'Grants administrators access to list and view all user roles.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:RolesCreate',
                'description'    => 'Grants administrators the ability to create additional user roles.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:RolesEdit',
                'description'    => 'Grants administrators the ability to edit user roles (non-administion roles only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:RolesDelete',
                'description'    => 'Grants administrators the ability to delete user roles (non-administion roles only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:Permissions',
                'description'    => 'Grants administrators access to list and view all user permissions.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:PermissionsCreate',
                'description'    => 'Grants administrators the ability to create additional user permissions.',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:PermissionsEdit',
                'description'    => 'Grants administrators the ability to edit user Permissions (non-administion permissions only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:PermissionsDelete',
                'description'    => 'Grants administrators the ability to delete user Permissions (non-administion permissions only).',
                'protected'      => TRUE
            ],
            [
                'name' => 'Admin:Settings',
                'description'    => 'Grants administrators the ability to modify Curator settings.',
                'protected'      => TRUE
            ]
        ]);
    }
}
