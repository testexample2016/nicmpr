<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

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

      // $user = UserDetail::find($id);

      $pdf = PDF::loadView('generate.generatedmpr');

      return $pdf->download('GeneratedMpr.pdf');

    }
}
