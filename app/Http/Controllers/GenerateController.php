<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Mprduration;

use App\Newproject;

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



      $employees = User::all();

      $mprdurationstatus = mprdurationcheck();

      $date = createdate();

       $review_generate = array();

      $initiative_generate = array();

       $award_generate = array();

      $training_generate = array();

      $inauguration_generate  =array();

      $newproject_state_generate = array();

      $newproject_central_generate =array();

      $project_state_generate = array();





      foreach($employees as $employee){

        foreach ($employee->reviews as $review) {

          if($review->year_month == $date){

            $review_generate[] = $review;
          }

          
        }

        foreach ($employee->initiatives as $initiative) {

          if($initiative->year_month == $date){

            $initiative_generate[] = $initiative;
          }
        }


            foreach ($employee->awards as $award) {

          if($award->year_month == $date){

            $award_generate[] = $award;
          }

      }


        foreach ($employee->trainings as $training) {

          if($training->year_month == $date){

            $training_generate[] = $training;
          }

      }


      foreach ($employee->inaugurations as $inauguration) {

          if($inauguration->year_month == $date){

            $inauguration_generate[] = $inauguration;
          }

      }

      foreach ($employee->newprojects as $newproject) {


          if($newproject->year_month == $date){

            if($newproject->central_state){

               $newproject_state_generate[] = $newproject;

            }

            else{

               $newproject_central_generate[] = $newproject;

            }

           
          }

      }


      foreach ($employee->projects as $project) {

          

            if($project->central_state){

              $project_state_generate[] = $project;
            }

          else{

            $project_central_generate[] = $project;
          }

      }



}


      $pdf = PDF::loadView('generate.generatedmpr',compact('employees','mprdurationstatus','date','review_generate','initiative_generate','award_generate','training_generate','inauguration_generate','newproject_state_generate','newproject_central_generate','project_state_generate','project_central_generate'));


      $pdf->setPaper('A4', 'portrait');

      return $pdf->download('GeneratedMpr.pdf');

    }
}
