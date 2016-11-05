<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the Curator roles table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds a list roles that users can be associated to.
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->string('description');
            $table->boolean('protected');
        });
    }

    /**
     * Reverse the Curator roles table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
