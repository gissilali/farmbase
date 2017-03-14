<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Ad;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class AdController extends Controller
{

    public function showCreateAdForm(){

    	$categories=Category::where('id','>=',0)->orderBy('name','asc')->get();
    	return view('create_ad',compact('categories'));
    
	}

    public function createAd(Request $request){
    	/*
    		Validate
    	 */
    	$validator = Validator::make($request->all(),[
 
    		'title' => 'required|min:5',
    		'description' => 'required|min:10',
    		'category' => 'required|integer',
    		'price' => 'required',
			'phone' => 'required',
			'location' => 'required',

    		]);
    	if($validator->fails()){
    		return back()->withErrors($validator)->withInput();
    	}
    	else{

    		$user = Auth::user();

    		$ad_id = $user->ads()->create([

    			'title' => $request['title'],
    			'description' => $request['description'],
    			'category_id' => $request['category'],
    			'price' => $request['price'],
    			'phone' => $request['phone'],
    			'location' => $request['location']

    			])->id;

    			if($request['negotiable']==true){

    				$ad = Ad::find($ad_id);

    				$ad->negotiable =true;

    				$ad->update();

    			}

    			$file = $request->file('image');

    			if($file){

    				$extension = $file->getClientOriginalExtension();
					Storage::disk('uploads')->put('ad_images/'.$user->id.'_'.$ad_id.'.'.$extension,File::get($file));					
					$ad = Ad::find($ad_id);
					$ad->image_url = 'ad_images/'.$user->id.'_'.$ad_id.'.'.$extension;
					$ad->update();

    			}
			Session::flash('ad_successful','Your Ad has been posted successfully');
			return redirect('view_ad/'.$ad_id);
    	}
		
	}

    public function showAd($ad_id){

    	$ad=Ad::find($ad_id);
        // dd($ad);
       

        $ads=Ad::orderBy('created_at','desc')->paginate(8);

    	return view('view_ad',compact('ad','ads'));

    }

    public function deleteAd($ad_id){

    	$ad = Ad::find($ad_id);

    	$ad->delete();

    }

    public function showUpdateAdForm($ad_id){

    	$ad = Ad::find($ad_id);

    	$categories=Category::where('id','>=',0)->orderBy('name','asc')->get();

    	return view('update_ad',compact('ad','categories'));

    }

    public function updateAd(Request $request,$ad_id){

    	

    	$validator = Validator::make($request->all(),[
 
    		'title' => 'required|min:5',
    		'description' => 'required|min:10',
    		'category' => 'required|integer',
    		'price' => 'required',
			'phone' => 'required',
			'location' => 'required',

    		]);
    	if($validator->fails()){
    		return back()->withErrors($validator)->withInput();
    	}
    	else{

    		$ad = Ad::find($ad_id);

    		$ad->title = $request['title'];
			$ad->description = $request['description'];
			$ad->category_id = $request['category'];
			$ad->price = $request['price'];
			$ad->phone = $request['phone'];
			$ad->location = $request['location'];

			$ad->update();

			if (request['negotiable']==true) {
				$ad->negotiable==true;
			}

			$file = $request->file('image');

			if ($file) {

				$user = Auth::user();
				
				$extension = $file->getClientOriginalExtension();
				
				Storage::disk('uploads')->delete('ad_images/'.$user->id.'_'.$ad_id.'.'.$extension);

				Storage::disk('uploads')->put('ad_images/'.$user->id.'_'.$ad_id.'.'.$extension,File::get($file));

				$ad->image_url = 'ad_images/'.$user->id.'_'.$ad_id.'.'.$extension;

				$ad->update();

			}
    		
			Session::flash('ad_successful','Your Ad has been posted successfully');
			return redirect('view_ad/'.$ad_id);
			
    	}

	}


}
