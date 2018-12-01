<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

   protected $dates = ['year_month'];

// public function setYearMonthAttribute($year_month) {

// 	$this->attributes['year_month'] = Carbon::createFromFormat('Y-m-d',$year_month);

// }
}
