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
         // dd($request->parameters[0]);

        

        for($i=0;$i<count($request->parameters);$i++)

        {
           $param = new Parameter();

           $param->project_id =  $request->project;

           $param->parametername =  $request->parameters[$i];

           $param->save();
        }
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
