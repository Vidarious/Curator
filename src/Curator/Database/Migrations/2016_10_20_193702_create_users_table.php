<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the Curator users table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds the user base for the Curator login system.
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->string('given_name', 50)->nullable();
            $table->string('family_name', 50)->nullable();
            $table->unsignedInteger('status_id');
            $table->rememberToken();
            $table->timestamps();

            $table->index(['username', 'email']);

            $table->foreign('status_id')
                  ->references('id')->on('status')
                  ->onDelete('no action')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the Curator users table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
