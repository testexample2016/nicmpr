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
}
