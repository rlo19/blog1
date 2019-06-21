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
        $this->middleware('auth');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (!$request->session()->exists('users')) {
            
            $uid = $request->user()->id;

            $api_token_key = $uid.'_api_token';

            $request->session()->put($api_token_key, $request->user()->api_token);

            $request->session()->put('uid', $uid);
        }  

        return view('home');
    }

    public function profile(Request $request)
    {
        return view('profile');
    }
}
