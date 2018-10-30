@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

<h2>Projects</h2>

<table class="table table-hover">

	<thead>
      <tr>
        <th>Project Name</th>
        <th>User Assigned</th>
        <th>Action</th>
       
      </tr>
    </thead>

     <tbody>

     	@foreach ($projects as $project)
      <tr>
        <td>{{ $project->projectname }} </td>
        <td>

          @if($project->user_id)

          {{ $project->user->name}}

          @endif

        </td>
        <td><a href="{{ action('ProjectController@edit', [$project->id]) }}"> Edit </a> </td>
      </tr>

      @endforeach
      
    </tbody>


</table>


<a href="{{ action('ProjectController@create') }}" class="btn btn-info" role="button"> Create Project</a>

@endsection