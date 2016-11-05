<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlagsTable extends Migration
{
    /**
     * Run the Curator flags table migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table holds a list of flags which can be assigned to a user.
        Schema::create('flags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 25)->unique()->index();
        });
    }

    /**
     * Reverse the Curator flags table migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flags');
    }
}
