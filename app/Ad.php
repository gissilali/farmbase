<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $fillable = ['title','user_id','category_id','description','price','negotiable','phone','location','public'];

    protected $hidden = ['negotiable','public'];

    /**
     * User Ad Relationship 
     */

    public function user(){

    	return $this->belongsTo('App\User');

    }

    public function category(){

    	return $this->belongsTo('App\Category');

    }

}
