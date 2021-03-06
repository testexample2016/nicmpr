<?php

namespace App\Http\Controllers;

use App\User;

use App\Project;

use App\Progress;

use App\Status;

use App\Mprduration;

use App\Cumulative;

use App\Newproject;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

use Hash;

class EmployeeController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $employee = Auth::user();

        // dd($employee->name);


        $mprdurationstatus = mprdurationcheck();

        // dd($mprdurationstatus);

       $date = createdate();

      
        return view('employee.index', compact('employee','mprdurationstatus','date'));


    }

   

    public function createProgress($id)
    { 
        $project = Project::findOrFail($id);

        if (Gate::allows('update-progress', $project)) {

        $mprdurationstatus = mprdurationcheck();

        $date = createdate();        
        

        // $project = Project::findOrFail($id);

        return view('employee.create', compact('project','date'));
    
     }

      else {

        return back();
      }   


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       $this->saveProgress($request);

    // $employee = Auth::user(); //Super Admin cannot view the changes directly it will send him to his own employee.index page so employee code needed

       $employee = User::findOrFail($request->emp);

       $mprdurationstatus = mprdurationcheck();

       $date = createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));


    }


    public function finalSubmit($id){

            // dd($request->emp);

             $status = new Status();

             $year_month = Mprduration::where('closed', 0)->value('year_month');

             // dd($year_month);


             $status->year_month = $year_month;

             $status->submitted = 1;

             $employee = User::findOrFail($id);

             $employee->statuses()->save($status);

             if(Auth::user()->isAdmin){

                return redirect()->action('EmployeeController@adminindex', ['id' => $id]);
             }

            

            return redirect('employee');



    }


    public function saveProgress(Request $request){

     

        $y = $request->repMonth;

      

        $z = $request->cumuInspection;


         foreach($y as $parameter_id=>$progress_value) 

       {
            $progress = new Progress();

                      
            $progress = Progress::updateOrCreate(

                 ['parameter_id' => $parameter_id, 'year_month' => Mprduration::where('closed', 0)->value('year_month')],

                     ['progress' => $progress_value]

                 );

       }

       foreach($z as $parameter_id=>$cumulative_value) 

       {
            $cumulative = new Cumulative();

                      
            $cumulative = Cumulative::updateOrCreate(

                 ['parameter_id' => $parameter_id],

                 ['cumulative' => $cumulative_value]

                 );

       }

      return;

    }

    public function adminindex($id)
    {
         $employee = User::findOrFail($id);

        $mprdurationstatus = mprdurationcheck();

        $date = createdate();
      

         return view('employee.index', compact('employee','mprdurationstatus','date'));
    }

    public function showChangePassword(){

        return view('auth.changepassword');

    }

     public function changePassword(Request $request){


        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = $request->get('new-password');
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    
}

