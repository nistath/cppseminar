<?php

use Illuminate\Database\Seeder;
use App\Models\Hub;

class HubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Hub::create([
    		"key" => 'ALPRP03M2eXfJYZ0',
			"latitude" => 38.147819,
			"longitude" => 23.490875,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => 'KQ7f81ER5VMYPgCV',
			"latitude" => 38.245503,
			"longitude" => 23.331620,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => '085m16PrR93aj9hA',
			"latitude" => 38.288198,
			"longitude" => 23.046128,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => '8kxJG357cBcMbrYM',
			"latitude" => 38.513456,
			"longitude" => 23.065549,
			"capacity" => 10,
			"active" => true
    	]);
    }
}
