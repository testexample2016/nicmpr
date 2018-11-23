@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

<h2>MPR Status</h2>

<table class="table table-hover">

	<thead>
      <tr>
        <th>Employee Name</th>
        <th>Designation</th>
        <th>Status</th>
       
      </tr>
    </thead>

     <tbody>

     	@foreach ($users as $user)
      @if(!$user->isAdmin)
      <tr>
        @if (Gate::forUser($user)->allows('finally-submitted')) 

          <td>
          <a href="{{ action('AdminController@show', [$user->id]) }}"> {{ $user->name }} </a>
        </td>
        <td>{{ $user->designation }}</td>
        <td>Submitted <span>&#10004;</span></td>

   @else
       <td>{{ $user->name }}</td>
       <td>{{ $user->designation }}</td>
       <td>Not Submitted <span>&#10006;</span>  </td>
       @endif
      
      </tr>
      @endif
      @endforeach
      
    </tbody>


</table>




@endsection