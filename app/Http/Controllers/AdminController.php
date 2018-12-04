<?php

namespace App\Http\Controllers;

use App\User;

use App\Mprduration;

use App\Http\Requests\UserCreateRequest;

use App\Http\Requests\UserUpdateRequest;



class AdminController extends Controller
{

     public function __construct()
{
    $this->middleware('auth');
}
    
    public function getDashboard()
    {

        $users = User::all();

        $mprdurationstatus = $this->mprdurationcheck();

        return view('admin.dashboard', compact('users','mprdurationstatus'));
    }


    public function index(){

    	
    	$users = User::all();

    	return view('admin.index', compact('users'));


    }


    public function show($id){

    	$employee = User::findOrFail($id);

        $mprdurationstatus = $this->mprdurationcheck();

        $date = $this->createdate();

       return view('employee.index', compact('employee','mprdurationstatus','date'));
  
    }


    public function create(){

    	return view('admin.create');
  
    }


    public function store(UserCreateRequest $request){


    	 User::create($request->all());

    	 return redirect('admin');
  
    }


    public function edit($id){

    	$user = User::findOrFail($id);

    	return view('admin.edit', compact('user'));
  
    }


    public function update($id, UserUpdateRequest $request){

    	$user = User::findOrFail($id);

    	$user->update($request->all());

    	return redirect('admin');
  
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

        elseif($mprduration->closed == 1)
        {
           $mprdurationstatus = 'Closed'; 
        }

        else{

            $mprdurationstatus = 'wrong';
        }

        return $mprdurationstatus;
    }


    public function splityearmonth()
    {
        $year_month = Mprduration::where('closed', 0)->value('year_month');

        $ym = explode("-", $year_month);

        return $ym;
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
