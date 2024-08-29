<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | validate requests
        |--------------------------------------------------------------------------
        */
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            // TODO: the right format for response data
        }

        /*
        |--------------------------------------------------------------------------
        | query the database
        |--------------------------------------------------------------------------
        */
        try {

            $user_created = User::create($validator->validated());

        } catch (\Throwable $th) {
            // TODO the right format for response data
        }

        if (!$user_created) {
            // TODO the right format for response data
            // return response()->json(['message' => 'Failed to create user'], 400);
        }

        /*
        |--------------------------------------------------------------------------
        | create verification link and send email to verify user
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | authenticate user
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | return successful request
        |--------------------------------------------------------------------------
        */
        // TODO format the right response and send data
    }

    public function login(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | validate requests
        |--------------------------------------------------------------------------
        */
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            // TODO: the right format for response data
        }

        /*
        |--------------------------------------------------------------------------
        | authenticate user
        |--------------------------------------------------------------------------
        */
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            // TODO: the right format for response data
            // return response()->json(['message' => 'User authenticated successfully'], 200);
        }
        // TODO: the right format for response data
        // return response()->json(['message' => 'Invalid credentials'], 401);

    }

    public function verifyAccount($token){
        /*
        |--------------------------------------------------------------------------
        | fetch token
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | check if token and verify
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | return response
        |--------------------------------------------------------------------------
        */


    }

}
