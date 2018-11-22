<?php

namespace App\Http\Controllers;

use App\User;

use App\Project;

use App\Progress;

use App\Status;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    

    public function __construct()
{
    $this->middleware('auth');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Carbon::now()->format('F'));

        // $employee_id = 1; //Hardcoded Employee for the time being

        // $employee = User::findOrFail($employee_id);

        $employee = Auth::user();

        return view('employee.index', compact('employee'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createProgress($id)
    {
        
        $project = Project::findOrFail($id);

        return view('employee.create', compact('project'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       // $x = $request->preMonth; //no need to insert into progress table, but first fetch it in create view

       // dd($x);

        // dd(date('Y-m'));

        

        // $z = $request->cumuInspection; //create a cumuInspection that has one to one relationship with parameter table there insert it, but first fetch it in create view

        // dd($z);

        // dd($request->submitbutton);

  
       $this->saveProgress($request);

      

       $employee = Auth::user(); //Hardcoded Employee for the time being

       // $employee = User::findOrFail($employee_id);

     
       return view('employee.index', compact('employee'));


    }


    public function finalSubmit($id){

            // dd($id);


             $employee_id = $id; //Hardcoded Employee for the time being

             $employee = User::findOrFail($employee_id);

             $status = new Status();

             $status->user_id = $employee_id;

             $status->year_month = date('Y-m');

             $status->submitted = 1;

             $status->save();

            return view('employee.index', compact('employee'));



    }


    public function saveProgress(Request $request){

        $y = $request->repMonth;

        // dd($y);

         foreach($y as $parameter_id=>$progress_value) 

       {
            $progress = new Progress();

                      
            $progress = Progress::updateOrCreate(

                 ['parameter_id' => $parameter_id, 'year_month' => date('Y-m')],

                     ['progress' => $progress_value]

                 );

       }

       return;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
