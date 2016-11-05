<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the Curator status table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds a list of status's which can be assigned to users.
        Schema::create('status', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 25)->unique();
        });
    }

    /**
     * Reverse the Curator status table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status');
    }
}
