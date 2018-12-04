<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
     protected $fillable = [

    	'user_id',
    	'award_name',
    	'date_of_award',
    	'project_name_regcognition',
    	'description',
    	'year_month'
    ];

    protected $dates = ['year_month'];

     public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

}
