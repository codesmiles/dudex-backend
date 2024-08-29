<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function register(Request $request){
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

        if($validator->fails()){
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

        if (!$user_created){
            // TODO the right format for response data
            // return response()->json(['message' => 'Failed to create user'], 400);
        }

        /*
        |--------------------------------------------------------------------------
        | send email to verify user
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

   public function login(Request $request){

   }
}
