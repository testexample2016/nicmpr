@extends('layouts.master')

@section('content')

@include('errors.error')

<h1>Edit:  {{ $user->name }}</h1>


<hr/>

{!! Form::model($user, ['method'=>'PATCH', 'action' => ['AdminController@update', $user->id]]) !!}

@include('admin.userform', ['submitButtonText' => 'Update Employee'])


{!!Form::close() !!}



@endsection