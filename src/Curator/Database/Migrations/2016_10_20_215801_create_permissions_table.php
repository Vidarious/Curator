<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the Curator permissions table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds a list of permissions which can be used to protect content.
        //Permissions can be assigned to Roles and/or Users which gives users access
        //the protected content.
        Schema::create('permissions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->string('description');
            $table->boolean('protected');
        });
    }

    /**
     * Reverse the Curator permissions table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}
