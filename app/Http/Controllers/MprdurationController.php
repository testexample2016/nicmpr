<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use App\Mprduration;

use App\User;

use App\Project;

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

          $employees = User::where('isAdmin','0')->get();

          // dd($employees);

         foreach ($employees as $employee) {
           
            if($employee->projects()->doesntExist()){

              return redirect('mprduration')->with('status', 'Please Assign Projects to all Employees!');
            }

          }
    
        Mprduration::updateOrCreate(

            ['year_month' => $request->input('open_year_month').'-01'], 

            ['closed' => 0]
        ); // -01 added because it is saved in DB as Y-m-01 format due to Carbon usage

        return redirect('mprduration');
    
       }



    elseif ($request->filled('close_year_month')  && !$request->filled('open_year_month')) {

      if(!Mprduration::alreadyClosed($request->input('close_year_month').'-01')->exists()) {

      $users = User::where('isAdmin', '!=', 1)->get();

      

      foreach ($users as $user) {
        
        if (Gate::forUser($user)->allows('final-submit')) {


          return redirect('mprduration')->with('status', 'Please Close All MPR!');

        }

      }


    
    
      $mprduration = Mprduration::where('year_month',$request->input('close_year_month').'-01')->firstOrFail();  // -01 added because it is saved in DB as Y-m-01 format due to Carbon usage

      $mprduration->closed = 1;

      $mprduration->save();
    }

      return redirect('mprduration');

    }


    else {

       return redirect('mprduration');
    }
}

}