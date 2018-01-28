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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAds = app('App\Http\Controllers\AdsController')->myAds(\Auth::user()->id);
        return view('home', [
            'ads'   =>  $userAds,
        ]);
    }
}
