<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            /**
             * return jsonapi
             * status
             * data
             * message
             * errors
             */

            $resp = [
                'status'  => 'ok',
                'data'    => [
                    'token' => $user->createToken('token-auth')->plainTextToken,
                    'name'  => $user->name, //check table structure
                ],
                'message' => 'Login succeed',
                'errors'  => null,
            ];

            return response()->json($resp, 200);
        }
    }

    public function register(AuthRequest $request)
    {

    }
}
