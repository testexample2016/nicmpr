<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [

    	'name',
    	'designation',
    	'email',
    	'password'
    ];


  public function setPasswordAttribute($password){

    $this->attributes['password'] = bcrypt($password);

   }


    public function projects()
    {
        return $this->hasMany('App\Project');
    }

   
}
