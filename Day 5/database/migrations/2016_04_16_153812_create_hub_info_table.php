<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHubInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_info', function (Blueprint $table) {
            $table->integer('hub_id')->unsigned();
            $table->foreign('hub_id')->references('id')->on('hubs');
            $table->string('key');
            $table->string('value');

            $table->primary(array('hub_id', 'key'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hub_info');
    }
}
