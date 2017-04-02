<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Ad;
class AdDataComposer{
	public $ads = '';
	public function __construct(){
		$this->ads = Ad::orderBy('created_at','desc')->paginate(8);
	}

	public function composer(){
		$ads = Ad::orderBy('created_at','desc')->paginate(8);
		return view('app',compact('ads'));

	}
}