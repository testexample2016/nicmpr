<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Initiative;

class InitiativeController extends Controller
{
    public function createInitiative($id)
    {
        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.initiative', compact('employee','date'));

    }

     public function storeInitiative(Request $request)
    {


      if ($request->filled('initiative')){

      	// dd($request->emp);

      	 $initiative = Initiative::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

       ['initiative' => $request->initiative ]


     );


      }

       $employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

       return view('employee.index', compact('employee','mprdurationstatus','date'));

    }
}
