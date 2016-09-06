<?php

namespace App\Modules\Cerberus\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Dingo\Api\Exception\StoreResourceFailedException;
use Carbon\Carbon;
use App\Models\User;
use App\Http\Requests;

class RefugeeController extends ApiController
{
    /**
     * Instantiate a new HubController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api.auth', ['except' => [
            'index'
        ]]);
    }

    /**
     * Display a listing of all hubs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id )
    {
        $user = User::find($id);
        if ($user == null)
            throw new \Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException('Could not find refugee.');
        $hubs = $user->actions()->groupBy('hub_id')->join('hubs','actions.hub_id', '=', 'hubs.id')->select(['hubs.latitude', 'hubs.longitude'])->get();


	foreach ($hubs as $hub){
        	$hub->latitude = (double)$hub->latitude;
        	$hub->longitude = (double)$hub->longitude;
	}

        return $this->response->array($hubs->toArray());
    }
}
