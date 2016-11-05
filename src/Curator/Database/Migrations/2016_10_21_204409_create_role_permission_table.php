<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the Curator role_permission table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the relationship between Roles and their assigned permissions.
        Schema::create('role_permission', function(Blueprint $table)
        {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');

            $table->primary(['role_id', 'permission_id']);

            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('permission_id')
                  ->references('id')->on('permissions')
                  ->onDelete('no action')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the Curator role_permission table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_permission');
    }
}
