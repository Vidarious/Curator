<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFlagTable extends Migration
{
    /**
     * Run the Curator user_flag table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the relationship between users and their assigned flags.
        Schema::create('user_flag', function(Blueprint $table)
        {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('flag_id');

            $table->primary(['user_id', 'flag_id']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('flag_id')
                  ->references('id')->on('flags')
                  ->onDelete('no action')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the Curator user_flag status migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_flag');
    }
}
