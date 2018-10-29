@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection



@section('content')

@include('errors.error')

<h1>Create User</h1>

<hr/>

{!! Form::open(['action' => 'AdminController@store']) !!}

@include('admin.userform', ['submitButtonText' => 'Add Employee'])


{!!Form::close() !!}


@endsection