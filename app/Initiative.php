<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
     protected $fillable = [

    	'user_id',
    	'initiative',
    	'year_month'
    ];

    protected $dates = ['year_month'];

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
