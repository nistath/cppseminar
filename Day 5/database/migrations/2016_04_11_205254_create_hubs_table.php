<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();

            $table->double('latitude', 15, 8);
            $table->double('longitude', 15, 8);

            $table->integer('capacity_meals')->nullable();
            $table->integer('capacity_drinks')->nullable();

            $table->boolean('active')->default(false);

            $table->integer('battery')->nullable();
            $table->timestamp('deployed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hubs');
    }
}
