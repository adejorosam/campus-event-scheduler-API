<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// php -S 127.0.0.1:8080 -t public/


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

Route::prefix('api/v1')->group(function()
{
    Route::apiResource('meeting', 'MeetingController');
    Route::apiResource('registration', 'RegistrationController');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('users', 'AuthController@users');
});

