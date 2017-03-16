<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class FavoriteController extends Controller
{
    public function favorite($ad_id){
    	if(count(Favorite::whereUserId(Auth::user()->id)->whereAdId($ad_id)->get())>0){
			Auth::user()->favorites()->detach($ad_id);

			return "false";
    	}
    	else{
    		Auth::user()->favorites()->attach($ad_id);

    		return "true";
    	}

    	return back();
    }
}
