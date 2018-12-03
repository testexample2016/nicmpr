<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newproject extends Model
{
    protected $fillable = [

    	'user_id',
    	'schemename',
    	'highlight',
    	'year_month',
    	'central_state'
    ];

   

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
