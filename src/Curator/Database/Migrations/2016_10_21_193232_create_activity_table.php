<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the Curator activity table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds a list of user activity.
        Schema::create('activity', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('action');
            $table->string('ip_address', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the Curator activity table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity');
    }
}
