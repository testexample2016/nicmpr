<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Inauguration;

class InaugurationController extends Controller
{
     public function createInauguration($id)
    {
        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.inauguration', compact('employee','date'));

    }

     public function storeInauguration(Request $request)
    {
      if ($request->filled('date_of_inauguration') && $request->filled('inaugurated_by') && $request->filled('description')){

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




    
}
