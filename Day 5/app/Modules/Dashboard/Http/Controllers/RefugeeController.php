<?php

namespace App\Modules\Dashboard\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;

class RefugeeController extends Controller
{
/**
     * Instantiate a new RefugeeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:manage.refugees', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of all refugees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$refugeeRoleId = DB::table('roles')->where('slug', 'refugee')->pluck('id');
        $refugees = User::join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_id', $refugeeRoleId)->select('users.*')->get();
        return view('dashboard::refugees.index')->with(compact('refugees'));
    }

    /**
     * Show the form for registering a new refugee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard::refugees.create');
    }

    /**
     * Store a newly created refugee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        
        $hub_key = str_random(16);
        Hub::create([
            "key" => $hub_key,
            "latitude" => $request->input('latitude'),
            "longitude" => $request->input('longitude')
        ]);

        $status = (object)[
            'class' => 'alert-success',
            'message' => 'Hub registered successfully. Please use the following key to deploy the hub: <b>' . $hub_key . '</b>'
        ];

        return redirect(route('hubs.index'))->with(compact('status'));
    }

    /**
     * Display the specified refugee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $refugee = User::findOrFail($id);
        return view('dashboard::refugees.show')->with(compact('refugee'));
    }

    /**
     * Show the form for editing the specified hub.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hub = Hub::findOrFail($id);
        return view('dashboard::hubs.edit')->with(compact('hub'));
    }

    /**
     * Update the specified hub in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hub = Hub::findOrFail($id);

        $this->validate($request, [
            'latitude' => 'required_unless:key,regenerate',
            'longitude' => 'required_unless:key,regenerate'
        ]);
        if ($request->input('key') != null) {
            $hub->key = str_random(16);
        } else {
            $hub->latitude = $request->input('latitude');
            $hub->longitude = $request->input('longitude');
        }
        $hub->save();
        
        return redirect(route('hubs.show', $id));
    }
}
