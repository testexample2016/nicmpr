<?php

namespace App\Http\Controllers;

use App\User;

use App\Project;

use App\Http\Requests\ProjectRequest;

// use Illuminate\Http\Request;

class ProjectController extends Controller
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

       
        $users = $this->formatUsers();

        return view('project.create', compact('users'));


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
    
      // dd($request->input('projectname'));

       $project = new Project();

       $this->projectValueSet($request, $project);


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
        $project = Project::findOrFail($id);

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        $users = $this->formatUsers();

        return view('project.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);

         $this->projectValueSet($request, $project);

        return redirect('project');
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


     /**
     * Show the form for creating a new resource.
     *
     * @return $users
     */

    private function formatUsers() {

        $users = User::where('isAdmin','!=', 1 )->pluck('name', 'id'); //As this is a collection so convert it to array

       // $users[0] = 'Not Assisgned';

       $users->prepend('Not Assisgned', 0);

       // ksort($users);

       return $users;

    }


    private function projectValueSet(ProjectRequest $request, Project $project){


        if($request->input('user')!=0)
       {

       $project->user_id = $request->input('user'); //not able to mass assign as parameter name is user not user_id

       }

       else {
        $project->user_id = null;
       }

        $project->projectname = $request->input('projectname'); 


        $project->noOfParam = $request->input('noOfParam');


        $project->central_state = $request->input('central_state');


        $project->save();


        return $project;


    }
}
