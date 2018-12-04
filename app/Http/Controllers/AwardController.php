<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Award;


class AwardController extends Controller
{
    public function createAward($id)
    {
        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.award', compact('employee','date'));

    }

     public function storeAward(Request $request)
    {


      if ($request->has('award_name') && $request->has('date_of_award') && $request->has('project_name_regcognition') && $request->has('description')){

      	// dd($request->emp);

      	 $award = Award::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

       ['award_name' => $request->award_name, 'date_of_award' => $request->date_of_award,'project_name_regcognition' => $request->project_name_regcognition, 'description' => $request->description

       ]


     );


      }

      	$employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));

    }




}
