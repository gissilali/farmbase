<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ad;
use App\Favorite;
use App\User;

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

        $user_ads = Auth::user()->ads()->get();
        $ads = Ad::orderBy('created_at','desc')->paginate(8);
        $favorites = Auth::user()->favorites()->get();
        return view('home',compact('user_ads','ads','favorites'));

    }
}
