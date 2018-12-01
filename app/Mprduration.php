<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Mprduration extends Model
{
    protected $fillable = [

    	'year_month',
    	'closed'
    	
    ];

protected $dates = ['year_month'];

public function setYearMonthAttribute($year_month) {

	$this->attributes['year_month'] = Carbon::createFromFormat('Y-m-d',$year_month);

}

// public function getYearMonthAttribute($year_month) {

// 	 return ucfirst($value);

// 	$this->attributes['year_month'] = Carbon::createFromFormat('Y-m-d',$year_month.'-01');

// }



}
