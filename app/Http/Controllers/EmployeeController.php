<?php

namespace App\Http\Controllers;

use App\User;

use App\Project;

use App\Progress;

use App\Status;

use App\Mprduration;

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
 
        $employee = Auth::user();

        // $mprduration = Mprduration::where([

        //     ['year_month','=' ,date('Y-m')],

        //     ['closed','=' ,0],

        // ])->first();

        $mprdurationstatus = $this->mprdurationcheck();

       

        return view('employee.index', compact('employee','mprdurationstatus'));


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
       // dd($request);

       // $x = $request->preMonth; //no need to insert into progress table, but first fetch it in create view

       // dd($x);

        // dd(date('Y-m'));

        

        // $z = $request->cumuInspection; //create a cumuInspection that has one to one relationship with parameter table there insert it, but first fetch it in create view

        // dd($z);

        // dd($request->submitbutton);

  
       $this->saveProgress($request);

      

       // $employee = Auth::user(); //Super Admin cannot view the changes directly it will send him to his own employee.index page so employee code needed

       $employee = User::findOrFail($request->emp);

       $mprdurationstatus = $this->mprdurationcheck();
       

        return view('employee.index', compact('employee','mprdurationstatus'));


    }


    public function finalSubmit(){

            // dd($id);


             

             $status = new Status();

             $status->year_month = date('Y-m');

             $status->submitted = 1;

             $employee = Auth::user();

             $employee->statuses()->save($status);

          //    $status = Status::updateOrCreate(      //In case anyone press /public/final more than one time-thats why url encapsulation needed
 
          //   ['user_id' => $employee->id , 'year_month' => date('Y-m')], 

          //   ['submitted' => 1]
        
          // );

            

            return redirect('employee');



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

    public function mprdurationcheck()
    {
         $mprduration = Mprduration::where('year_month','=' ,date('Y-m'))->first();

        if($mprduration == null)

        {
            $mprdurationstatus = 'NotGenerated';
        }

        elseif($mprduration->closed == 0)
        {
           $mprdurationstatus = 'Opened'; 
        }

        elseif($mprduration->closed == 1)
        {
           $mprdurationstatus = 'Closed'; 
        }

        else{

            $mprdurationstatus = 'wrong';
        }

        return $mprdurationstatus;
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

