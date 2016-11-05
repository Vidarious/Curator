<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the Curator user_role table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the relationship between users and their assigned role.
        Schema::create('user_role', function(Blueprint $table)
        {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');

            $table->primary(['user_id', 'role_id']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('no action')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the Curator user_role table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_role');
    }
}
