<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [

    	'user_id',
    	'projectname',
    	'noOfParam'
    	
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function parameters()
    {
        return $this->hasMany('App\Parameter');
    }

     public function progresses()
    {
        return $this->hasManyThrough('App\Progress', 'App\Parameter');
    }
}
