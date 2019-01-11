<?php

namespace App\Http\Controllers;

use App\User;

use App\Mprduration;

use App\Http\Requests\UserCreateRequest;

use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Mail;

use App\Mail\UserPassword;



class AdminController extends Controller
{

     public function __construct()
{
    $this->middleware('auth');
}
    
    public function getDashboard()
    {

        $users = User::all();

        $mprdurationstatus = mprdurationcheck();

        return view('admin.dashboard', compact('users','mprdurationstatus'));
    }


    public function index(){

    	
    	$users = User::all();

    	return view('admin.index', compact('users'));


    }


    public function show($id){

    	$employee = User::findOrFail($id);

        if (Gate::forUser($employee)->allows('finally-submitted')) {

        $mprdurationstatus = mprdurationcheck();

        $date = createdate();

       return view('employee.index', compact('employee','mprdurationstatus','date'));

   }
   else{

    return back();
   }
  
    }


    public function create(){

    	return view('admin.create');
  
    }


    public function store(UserCreateRequest $request){


    	 $user = User::create($request->all());


         $token = app('auth.password.broker')->createToken($user);

         Mail::to($request->user())->queue(new UserPassword($token));

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

}
