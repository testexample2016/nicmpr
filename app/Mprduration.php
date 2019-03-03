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

public function scopeAlreadyClosed($query, $year_month)
    {
        return $query->where([
       
        ['year_month','=',$year_month],

        ['closed','=',1]

      ]);
    }

public function scopeAlreadyOpened($query, $year_month)
    {
        return $query->where([
       
        ['year_month','=',$year_month],

        ['closed','=',0]

      ]);
    }

}
