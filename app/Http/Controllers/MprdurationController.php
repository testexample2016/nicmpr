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

          $mprdurations = Mprduration::all();

          foreach ($mprdurations as $mprduration) {
           
            if($mprduration->closed == 0){

              return redirect('mprduration')->with('status', 'Please Close Opened Month!');
            }

          }
    
        Mprduration::updateOrCreate(

            ['year_month' => $request->input('open_year_month').'-01'], 

            ['closed' => 0]
        ); // -01 added because it is saved in DB as Y-m-01 format due to Carbon usage
    
       }


     elseif ($request->filled('close_year_month')  && !$request->filled('open_year_month')) {
    
        // Mprduration::updateOrCreate(

        //     ['year_month' => $request->input('close_year_month')],

        //     ['closed' => 1]
        // );

      $mprduration = Mprduration::where('year_month',$request->input('close_year_month').'-01')->firstOrFail();  // -01 added because it is saved in DB as Y-m-01 format due to Carbon usage

      $mprduration->closed = 1;

      $mprduration->save();

      // Mprduration::where('year_month',$request->input('close_year_month'))
      //            ->update(['closed' => 1]);

   
       }

       // else {

       //  abort(403);

       // }
       
   	 return redirect('mprduration');
  
    }
}
