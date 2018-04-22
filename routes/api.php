<?php

use Illuminate\Http\Request;

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
Route::get('/home', function (){
    $data = [
        ['title' => 'First event','description' => 'Text about first event','url' => "http://wikimotive.com/wikiblog/wp-content/uploads/sites/2/2013/10/events-heavenly-header1.jpg"],
        ['title' => 'Second event','description' => 'Text about second event','url' => "http://www.catalyst.org/uploads/styles/content-large/public/Events.jpg"],
    ];

    return response()->json($data);
});


Route::post('/user/register', function (Request $request){
    \App\User::create([
        'name' => 'Anonymous',
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);
    return response()->json($request->all());
});

