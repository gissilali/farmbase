<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ad;

class FilterAndSortController extends Controller
{
    public function fetchFarmProduce($category_id){

    	$ad=Ad::find(4);

    	$ads = Ad::whereCategoryId($category_id)->paginate(8);
  
  		$categories = Category::all();
  		if($ads){
				return view('view_ad',compact('ads','categories','ad'));
  		}
  		else{
  			return "no ad from that category";
  		}


    }
}