<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Review;

class ReviewController extends Controller
{
   public function createReview($id)
    {
        $employee = User::findOrFail($id);
         
        $date = createdate();

        return view('optional.review', compact('employee','date'));

    }

     public function storeReview(Request $request)
    {


      if ($request->has('reviewer_name') && $request->has('date_of_review') && $request->has('designation') && $request->has('description') && $request->has('suggestion') && $request->has('target')){

      	// dd($request->emp);

      	 $award = Review::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

       ['reviewer_name' => $request->reviewer_name, 'date_of_review' => $request->date_of_review,'designation' => $request->designation, 'description' => $request->description, 'suggestion' => $request->suggestion, 'target' => $request->target

       ]


     );


      }

      	$employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));

    }

}
