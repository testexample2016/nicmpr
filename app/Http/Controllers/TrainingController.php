<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Training;

class TrainingController extends Controller
{
     public function createTraining($id)
    {
        $employee = User::findOrFail($id);
         
        $date = $this->createdate();

        return view('optional.training', compact('employee','date'));

    }

     public function storeTraining(Request $request)
    {
      if ($request->filled('date_of_training') && $request->filled('days_of_training') && $request->filled('provided_by') && $request->filledfilled('attended_by') && $request->filled('description')){

      	// dd($request->emp);

      	 $training = Training::updateOrCreate(

      ['user_id' => $request->emp, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

       ['date_of_training' => $request->date_of_training, 'days_of_training' => $request->days_of_training,'provided_by' => $request->provided_by, 'attended_by' => $request->attended_by, 'description' => $request->description

       ]


     );


      }

      	$employee = User::findOrFail($request->emp); //remove this duplicate code redirect to another page

       $mprdurationstatus = $this->mprdurationcheck();

       $date = $this->createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));

    }




    public function mprdurationcheck()
    {
         $mprduration = Mprduration::where('closed','=' ,0)->first();

        if($mprduration == null)

        {
            $mprdurationstatus = 'NotGenerated';
        }

        elseif($mprduration->closed == 0)
        {
           $mprdurationstatus = 'Opened'; 
        }

        else{

            $mprdurationstatus = 'wrong';
        }

        return $mprdurationstatus;
    }

     public function createdate(){

          $mprdurationstatus = $this->mprdurationcheck();

         if($mprdurationstatus == 'Opened'){

            $date = Mprduration::where('closed', 0)->value('year_month');
        }

        else{

              $date = Carbon::now();


        }
       

        return $date;
    }
}
