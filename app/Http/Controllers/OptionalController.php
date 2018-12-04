<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Newproject;

use App\Mprduration;

use App\Inauguration;

// use Illuminate\Support\Facades\Gate;


class OptionalController extends Controller
{
    

    public function createOptional($id)
    {

        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.central_state_projects', compact('employee','date'));

    }

        public function storeOptional(Request $request)
    {

        //code duplication remove from here


     if ($request->has('schemename_central') && $request->has('highlight_central'))

       {
    

     $newproject_central = Newproject::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month'),  'central_state' => 0      ],

       ['schemename' => $request->schemename_central, 'highlight' => $request->highlight_central

     
       ]


     );

 }

  if ($request->has('schemename_state') && $request->has('highlight_state'))

       {
    

     $newproject_state = Newproject::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month'),  'central_state' => 1      ],

       ['schemename' => $request->schemename_state, 'highlight' => $request->highlight_state

     
       ]


     );

    $employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));


 }

     

    }

    public function createInauguration($id)
    {
        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.inauguration', compact('employee','date'));

    }

     public function storeInauguration(Request $request)
    {
      if ($request->has('date_of_inauguration') && $request->has('inaugurated_by') && $request->has('description')){

      	// dd($request->emp);

      	 $inauguration = Inauguration::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

       ['date_of_inauguration' => $request->date_of_inauguration, 'inaugurated_by' => $request->inaugurated_by,'description' => $request->description

       ]


     );


      }

      	$employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));

    }




    


    // public function backToEmployee($emp){

    // 	// dd($emp);

    // 	$employee = User::findOrFail($emp);

    //    $mprdurationstatus = $this->mprdurationcheck();

    //    $date = $this->createdate();

      

    //      return view('employee.index', compact('employee','mprdurationstatus','date'));


    // }

}
