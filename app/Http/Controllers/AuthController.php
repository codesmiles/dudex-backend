<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Enums\ResponseCodeEnums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;
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
          return $this->sendResponse($validator->errors(),ResponseCodeEnums::AUTH_REQUEST_VALIDATION_ERROR);
        }

        /*
        |--------------------------------------------------------------------------
        | query the database
        |--------------------------------------------------------------------------
        */
        try {
            $user_created = User::create($validator->validated());

        } catch (\Throwable $exception) {
            return $this->sendResponse($exception->getMessage(), ResponseCodeEnums::AUTH_SERVICE_REQUEST_ERROR);
        }

        /*
        |--------------------------------------------------------------------------
        | if user creation failed
        |--------------------------------------------------------------------------
        */
        if (!$user_created) {
            return $this->sendResponse([], ResponseCodeEnums::AUTH_SERVICE_REQUEST_FAILED);
        }

        /*
        |--------------------------------------------------------------------------
        | create verification link and send email to verify user
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | return successful request
        |--------------------------------------------------------------------------
        */
        return $this->sendResponse([], ResponseCodeEnums::AUTH_REQUEST_SUCCESSFUL);
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
            return $this->sendResponse($validator->errors(), ResponseCodeEnums::AUTH_REQUEST_VALIDATION_ERROR);
        }

        /*
        |--------------------------------------------------------------------------
        | authenticate user
        |--------------------------------------------------------------------------
        */
        if (!auth()->attempt($request->only("email", "password"))) {
            return $this->sendResponse([], ResponseCodeEnums::AUTH_SERVICE_REQUEST_FAILED);
        }


        /*
        |--------------------------------------------------------------------------
        | generate authorization token
        |--------------------------------------------------------------------------
        */
        $user = Auth::user()->createToken('authToken')->plainTextToken;

        /*
        |--------------------------------------------------------------------------
        | return successful response
        |--------------------------------------------------------------------------
        */
        return $this->sendResponse(['token' => $user], ResponseCodeEnums::AUTH_REQUEST_SUCCESSFUL);
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
