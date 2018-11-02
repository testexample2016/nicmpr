<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
	protected $fillable = [

    	'project_id',
    	'year_month',
    	'progress'
    	
    ];

    protected $dateFormat = 'Y-m';
    

    public function parameter()
    {
        return $this->belongsTo('App\Parameter');
    }
}
