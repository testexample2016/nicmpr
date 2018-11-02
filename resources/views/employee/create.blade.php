@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection



@section('content')

@include('errors.error')

<hr/>

{!! Form::open(['action' => 'EmployeeController@store']) !!}

<table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>

  <tr class="table-info">

<td>Project Name:</td>

<td> {{$project->projectname}}</td>

<td class="table-info"></td>

<td class="table-info"></td>

</tr>

 <tr class="table-info">

<td>Employee Name: </td>

<td>

	 @if($project->user_id)


	{{$project->user->name}}


	@endif

</td>

<td class="table-info"></td>

<td class="table-info"></td>

</tr>

<tr class="table-info">

<td>Employee Designation:</td>

<td>
	 @if($project->user_id)

	{{$project->user->designation}}

	@endif

</td>

<td class="table-info"></td>

<td class="table-info"></td>

</tr>


<tr class="table-info">

<td>Current Year:</td>

<td> {{ Carbon\Carbon::now()->format('Y') }} </td>


<td>Current Month</td>

<td>  {{ Carbon\Carbon::now()->format('F') }} </td>
</tr>



</tbody>
</table>

<h1>Create Progress:</h1>

<hr/>



{!!Form::close() !!}


@endsection