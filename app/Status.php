<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [

    	'year_month',
    	'submitted'
    ];



    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
