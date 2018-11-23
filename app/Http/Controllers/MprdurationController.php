<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mprduration;

class MprdurationController extends Controller
{
     
     public function index(){

     	$mprdurations = Mprduration::all();


    
       	return view('mprduration.index', compact('mprdurations'));


    }



    public function store(Request $request){

// dd($request->all());

        if ($request->filled('open_year_month') && !$request->filled('close_year_month')) {
    
        Mprduration::updateOrCreate(

            ['year_month' => $request->input('open_year_month')],

            ['closed' => 0]
        );
    
       }


     elseif ($request->filled('close_year_month')  && !$request->filled('open_year_month')) {
    
        Mprduration::updateOrCreate(

            ['year_month' => $request->input('close_year_month')],

            ['closed' => 1]
        );
        
       }

       // else {

       //  abort(403);

       // }
       
   	 return redirect('mprduration');
  
    }
}
