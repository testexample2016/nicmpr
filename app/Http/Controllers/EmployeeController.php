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

        $mprdurationstatus = $this->mprdurationcheck();


       $date = $this->createdate();

      
        return view('employee.index', compact('employee','mprdurationstatus','date'));


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

         $mprdurationstatus = $this->mprdurationcheck();

       $date = $this->createdate();        
        

        $project = Project::findOrFail($id);

        return view('employee.create', compact('project','date'));


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

       $mprdurationstatus = $this->mprdurationcheck();

       $date = $this->createdate();

      

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

          //    $status = Status::updateOrCreate(      //In case anyone press /public/final more than one time-thats why url encapsulation needed
 
          //   ['user_id' => $employee->id , 'year_month' => date('Y-m')], 

          //   ['submitted' => 1]
        
          // );

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

    public function adminindex($id)
    {
         $employee = User::findOrFail($id);

        $mprdurationstatus = $this->mprdurationcheck();

        $date = $this->createdate();
      

         return view('employee.index', compact('employee','mprdurationstatus','date'));
    }

    public function createOptional($id)
    {
        $employee = User::findOrFail($id);
         
        $date = $this->createdate();

        return view('employee.optional', compact('employee','date'));

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

 }

      $employee = User::findOrFail($request->emp);

       $mprdurationstatus = $this->mprdurationcheck();

       $date = $this->createdate();

      

         return view('employee.index', compact('employee','mprdurationstatus','date'));

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

