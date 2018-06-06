<?php

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\Event as EventResource;
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


Route::post('/auth/register', 'API\UserController@register');
Route::post('/auth/login', 'API\UserController@login');

Route::get('/events', function (){
    return EventResource::collection(Event::all());
});

Route::get('/event/{event}', function ($id){
    return new EventResource(Event::find($id));
});

