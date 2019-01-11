<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

class GenerateController extends Controller
{
      
      public function preview(){

    	 $employees = User::all();

    	 $mprdurationstatus = mprdurationcheck();

    	 $date = createdate();

    	return view('generate.preview',compact('employees','mprdurationstatus','date'));


    }
}
