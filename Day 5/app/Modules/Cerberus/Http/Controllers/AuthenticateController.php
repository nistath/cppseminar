<?php

namespace App\Modules\Cerberus\Http\Controllers;

use JWTAuth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends ApiController
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                throw new \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException(null, 'Invalid user credentials provided.');
            }
        } catch (JWTException $e) {
            throw new \Symfony\Component\HttpKernel\Exception\HttpException(null, 'Could not create JSON Web Token.');
        }

        return response()->json(compact('token'));
    }
}
