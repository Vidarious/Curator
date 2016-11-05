<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the Curator user_permission table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the relationship between users and their assigned permissions.
        Schema::create('user_permission', function(Blueprint $table)
        {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('permission_id');

            $table->primary(['user_id', 'permission_id']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('permission_id')
                  ->references('id')->on('permissions')
                  ->onDelete('no action')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the Curator user_permission table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_permission');
    }
}
