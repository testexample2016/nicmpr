<?php

namespace App\Http\Controllers;

use App\Project;

use App\Parameter;

use Illuminate\Http\Request;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load project show view from here
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();

        // $projects_list = Project::pluck('projectname', 'id');

        // $projects_list->prepend('Please Select', 'null');

        // $projectnames = Project::pluck('projectname');

        // $projectids = Project::pluck('id');

        // return view('param.create', compact('projects_list','projects'));

        return view('param.create', compact('projects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
         $this->paramValueSet($request->parameters, $request->project);

         $project = Project::findOrFail($request->project);

           return view('project.show', compact('project'));
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
        $project = Project::findOrFail($id);

        return view('param.edit', compact('project'));
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

        for($i=0;$i<count($request->parameters);$i++)

        {
          $deletedRows = Parameter::where('project_id', $id)->delete();
  
        }


        $this->paramValueSet($request->parameters, $id);

        $project = Project::findOrFail($id);

        return view('project.show', compact('project'));


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


    // public function ajaxtest(){

    //      $msg = "This is a simple message.";
    //   return response()->json(array('msg'=> $msg), 200);
    // }


    private function paramValueSet($parameters, $id){

         for($i=0;$i<count($parameters);$i++)

        {
           $param = new Parameter();

           $param->project_id =  $id; 

           $param->parametername =  $parameters[$i];

           $param->save();

          
        }

        return;

    }
}
