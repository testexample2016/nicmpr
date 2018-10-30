<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [

    	'userid',
    	'projectname',
    	
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
