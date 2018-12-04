<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [

    	'user_id',
        'reviewer_name',
    	'date_of_review',
    	'designation',
    	'description',
    	'suggestion',
    	'target',
    	'year_month'
    ];

    protected $dates = ['year_month'];

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
