<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| authorized and verified users
|--------------------------------------------------------------------------
*/
Route::group(["middleware" => ['auth:api','auth:sanctum','verified']],function(){

});


/*
|--------------------------------------------------------------------------
| authorized users
|--------------------------------------------------------------------------
*/
Route::group(["middleware" => ['auth:api','auth:sanctum'], 'prefix' => '/v1/auth/user'],function (){
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); // Mark the user's email as verified
        return response()->json(['message' => 'Email verified successfully.']);
    })->name('verification.verify');
    Route::post('/email/resend', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent.']);
    });
});

/*
|--------------------------------------------------------------------------
| api token
|--------------------------------------------------------------------------
*/
Route::group(["middleware" =>['auth:api'] ,'prefix' => '/v1'], function () {
    Route::group(['prefix' => '/auth'], function () {
        Route::post('/login', [AuthController::class, "login"]);
        Route::post('/register', [AuthController::class, "register"]);
    });
});

/*
|--------------------------------------------------------------------------
| test
|--------------------------------------------------------------------------
*/
Route::get("/",function(Request $request){
    return response()->json([
        "success"=>true,
        "message" => "it works"
    ]);
});
