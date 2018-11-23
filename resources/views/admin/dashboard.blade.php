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
      <tr>
       @if($user->statuses()->where([
                    ['year_month', '=', '2018-11'],
                    ['submitted', '=', 1]
                ])->exists())
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

      @endforeach
      
    </tbody>


</table>




@endsection