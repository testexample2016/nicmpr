<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
	protected $fillable = [

    	'parameter_id',
    	'year_month',
    	'progress'
    	
    ];

    // protected $dateFormat = 'Y-m';
    

    public function parameter()
    {
        return $this->belongsTo('App\Parameter');
    }

   //  public function setYearMonthAttribute($year_month){

   //  $this->attributes['year_month'] = date('Y-m', $year_month);;

   // }
}
