<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests\UserCreateRequest;

use App\Http\Requests\UserUpdateRequest;



class AdminController extends Controller
{
    public function index(){

    	
    	$users = User::all();

    	return view('admin.index', compact('users'));


    }


    public function show($id){

    	$user = User::findOrFail($id);

    	return view('admin.show', compact('user'));
  
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



}
