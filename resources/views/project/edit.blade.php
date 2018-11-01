@extends('layouts.master')

@section('content')

@include('errors.error')

<h1>Edit:  {{ $project->projectname }}</h1>


<hr/>

{!! Form::model($project, ['method'=>'PATCH', 'action' => ['ProjectController@update', $project->id]]) !!}

@include('project.userform', ['submitButtonText' => 'Update Project'])


{!!Form::close() !!}



@endsection