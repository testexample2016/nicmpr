<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mprduration;

class MprdurationController extends Controller
{
     
     public function index(){

     	$mprdurations = Mprduration::all();


    
       	return view('mprduration.index', compact('mprdurations'));


    }


    public function show($id){

    	
    }


    public function store(Request $request){


    	 Mprduration::create($request->all());

    	 return redirect('admin');
  
    }
}
