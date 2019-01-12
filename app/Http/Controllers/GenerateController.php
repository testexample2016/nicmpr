<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Newproject;

use PDF;

class GenerateController extends Controller
{
      
      public function preview(){

    	 $employees = User::all();

    	 $mprdurationstatus = mprdurationcheck();

    	 $date = createdate();

    	return view('generate.preview',compact('employees','mprdurationstatus','date'));


    }

     public function downloadPDF(){

      //First Part

      $employees = User::all();

      $mprdurationstatus = mprdurationcheck();

      $date = createdate();

      //First Part

      //Second Part

      

      //Second Part



      $pdf = PDF::loadView('generate.generatedmpr',compact('employees','mprdurationstatus','date'));

      $pdf->setPaper('A4', 'portrait');

      return $pdf->download('GeneratedMpr.pdf');

    }
}
