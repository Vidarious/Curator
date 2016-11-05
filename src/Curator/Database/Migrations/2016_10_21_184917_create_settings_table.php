<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the Curator settings table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the settings for the Curator application.
        Schema::create('settings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('login_method', 15);
            $table->boolean('remember_me');
            $table->boolean('login_throttling');
            $table->unsignedTinyInteger('login_throttling_attempts');
            $table->unsignedInteger('login_throttling_lockout');
            $table->unsignedInteger('user_idle_time');
            $table->unsignedinteger('default_role_id');
            $table->string('login_page');

            $table->foreign('default_role_id')
                  ->references('id')->on('roles')
                  ->onDelete('no action')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the Curator settings table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
