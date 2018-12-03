<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cumulative extends Model
{

	protected $fillable = [

    	'parameter_id',
    	'cumulative'
    	
    ];
    

     public function parameter()
    {
        return $this->belongsTo('App\Parameter');
    }
}
