<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function api(){

        $data = [
            ['name' => 'first','url' => "test1"],
            ['name' => 'second','url' => "test2"],
        ];

        return response()->json($data);
    }
}
