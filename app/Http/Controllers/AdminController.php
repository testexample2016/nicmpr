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

        return view('admin.dashboard', compact('users'));
    }


    public function index(){

    	
    	$users = User::all();

    	return view('admin.index', compact('users'));


    }


    public function show($id){

    	$employee = User::findOrFail($id);

        $mprdurationstatus = $this->mprdurationcheck();

        $date = $this->createdate();

         // dd($date);
      
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


    public function splityearmonth()
    {
        $year_month = Mprduration::where('closed', 0)->value('year_month');

        $ym = explode("-", $year_month);

        return $ym;
    }

    public function createdate(){

         $ym = $this->splityearmonth();

        $year = $ym[0];

        $month = $ym[1];

        $date = date_create($year.'-'.$month.'-'."1");

        return $date;
    }




}
