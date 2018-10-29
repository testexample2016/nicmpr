@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

<h1>Employee Name: {{$user->name}}</h1>

<h3>Employee Designation:{{$user->designation}}</h3>

<h3>Employee Email:{{$user->email}}</h3>

@endsection