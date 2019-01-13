@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

<h2>Employees</h2>

<table class="table table-hover">

	<thead>
      <tr>
        <th>Employee Name</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>

     <tbody>

     	@foreach ($users as $user)
        @if(!$user->isAdmin)
      <tr>
        <td>{{ $user->name }} </td>
        <td>{{ $user->designation }}</td>
        <td>{{ $user->email }}</td>
         <td><a href="{{ action('AdminController@edit', [$user->id]) }}"> Edit </a> </td>
      </tr>

      @endif
      @endforeach
      
    </tbody>


</table>


<a href="{{ action('AdminController@create') }}" class="btn btn-info" role="button"> Create User</a>

@endsection