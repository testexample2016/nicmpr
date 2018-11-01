@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection



@section('content')

@include('errors.error')

<h1>Create Project</h1>

<hr/>

{!! Form::open(['action' => 'ProjectController@store']) !!}

@include('project.userform', ['submitButtonText' => 'Add Project'])


{!!Form::close() !!}


@endsection