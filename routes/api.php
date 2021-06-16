<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
$namespace = 'App\Http\Controllers';

Route::group(['namespace' => $namespace], function() {
    Route::post('/subscribe', 'SubscriptionController@add')->name('api.subscribe');
});