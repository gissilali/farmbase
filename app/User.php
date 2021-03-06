<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Ad-User Relationship
     */
    
    public function ads(){

        return $this->hasMany('App\Ad');

    }

    /**
     * Ad Favorite Relationship
     */
    
    public function favorites(){

        return $this->belongsToMany('App\Ad','favorites','user_id','ad_id')->withTimestamps();
        
    }
    

}
