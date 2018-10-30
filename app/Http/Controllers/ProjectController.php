<?php

namespace App\Http\Controllers;

use App\User;

use App\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::all();

       return view('project.index', compact('projects'));

       // dd($projects);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
       $users = User::pluck('name', 'id')->toArray(); //As this is a collection so convert it to array

       $users[0] = 'Not Assisgned';

       ksort($users);

        return view('project.create', compact('users'));


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
      // dd($request->input('projectname'));

       $project = new Project();

       if($request->input('user')!=0)
       {

       $project->user_id = $request->input('user'); //not able to mass assign as parameter name is user not user_id

       }

       else {
        $project->user_id = null;
       }

        $project->projectname = $request->input('projectname'); 


        $project->save();


          return redirect('project');
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
