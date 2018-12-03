<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = [

    	'project_id',
    	'parametername'
    	
    ];

    

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function progresses()
    {
        return $this->hasMany('App\Progress');
    }

    public function cumulative()
    {
        return $this->hasOne('App\Cumulative');
    }
}
