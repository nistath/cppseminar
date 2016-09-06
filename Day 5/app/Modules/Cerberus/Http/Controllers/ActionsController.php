<?php

namespace App\Modules\Cerberus\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Dingo\Api\Exception\StoreResourceFailedException;
use Carbon\Carbon;
use App\Models\Action;
use App\Models\Hub;
use App\Http\Requests;

class ActionsController extends ApiController
{
    /**
     * Instantiate a new ActionsController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api.auth');
    }

    /**
     * Store a newly created action in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = app('Dingo\Api\Auth\Auth')->user();

        $rules = [
            'hub' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'meals' => ['required', 'integer'],
            'drinks' => ['required', 'integer']
        ];

        $payload = $request->only('hub', 'type', 'meals', 'drinks');
        $validator = app('validator')->make($payload, $rules);
        if ($validator->fails()) {
            throw new StoreResourceFailedException('Could not store action hub.', $validator->errors());
        }

        $hub = Hub::find($request->input('hub'));
        if ($hub == null) {
            throw new StoreResourceFailedException('Could not store action because an invalid key was entered.', $validator->errors());
        }

        $type = $request->input('type');
        $meals = (integer)$request->input('meals');
        $drinks = (integer)$request->input('drinks');

        if ($type == "takeaway") {
            if (!($user->hasRole('refugee'))) {
                throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException('You do not have the required refugee role.');
            }
            $user_meals_left = (integer)$user->data('meals_left');
            $user_drinks_left = (integer)$user->data('drinks_left');

            $hub_meals_left = (integer)$hub->data('meals_left');
            $hub_drinks_left = (integer)$hub->data('drinks_left');

            if (($user_meals_left == null)||($user_drinks_left == null)) {
                throw new StoreResourceFailedException('Could not create action because there was a user error.');
            } elseif (($meals > $user_meals_left)||($drinks > $user_drinks_left)) {
                throw new StoreResourceFailedException('Could not create action because the user is fat.', $validator->errors());
            }

            if (($hub_meals_left == null)||($hub_drinks_left == null)) {
                throw new StoreResourceFailedException('Could not create action because there was a user error.');
            } elseif (($meals > $hub_meals_left)||($drinks > $hub_drinks_left)) {
                throw new StoreResourceFailedException('Could not create action because the users are fat.', $validator->errors());
            }

            $user->actions()->create([
                "type" => "takeaway",
                "hub_id" => $hub->id,
                "quantity_meals" => $meals,
                "quantity_drinks" => $drinks
            ]);

            $user->setData('meals_left', ($user_meals_left - $meals));
            $user->setData('drinks_left', ($user_drinks_left - $drinks));
            $hub->setData('meals_left', ($hub_meals_left - $meals));
            $hub->setData('drinks_left', ($hub_drinks_left - $drinks));
        } elseif ($type == "refill") {
            if (!($user->hasPermission('manage.hubs'))) {
                throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException(null, 'You do not have the required manage.hubs permission.');
            }

            $user->actions()->create([
                "type" => "refill",
                "hub_id" => $hub->id,
                "quantity_meals" => $meals,
                "quantity_drinks" => $drinks
            ]);

            $hub_meals_left = (integer)$hub->data('meals_left');
            $hub_drinks_left = (integer)$hub->data('drinks_left');

            if ((($hub_meals_left + $meals) > $hub->capacity_meals) || (($hub_drinks_left + $drinks) > $hub->capacity_drinks))
                throw new StoreResourceFailedException('Could not create action because you have exceeded the capacity of the hub.', $validator->errors());

            $hub->setData('meals_left', ($hub_meals_left + $meals));
            $hub->setData('drinks_left', ($hub_drinks_left + $drinks));
        }

        return $this->response->created();
    }
}
