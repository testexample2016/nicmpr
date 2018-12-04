<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inauguration extends Model
{
     protected $fillable = [

    	'user_id',
    	'date_of_inauguration',
    	'inaugurated_by',
    	'description',
    	'year_month'
    ];

    protected $dates = ['year_month'];

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

}
