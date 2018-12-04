<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
     protected $fillable = [

    	'user_id',
    	'date_of_training',
    	'days_of_training',
    	'provided_by',
    	'attended_by',
    	'description',
    	'year_month'
    ];

    protected $dates = ['year_month'];

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
