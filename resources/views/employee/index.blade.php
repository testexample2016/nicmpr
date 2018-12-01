@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

<table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>

  <tr class="table-info">

<td>Employee Name:</td>

<td> {{$employee->name}}</td>

<td></td>

<td></td>

</tr>

 <tr class="table-info">

<td>Designation: </td>

<td> {{$employee->designation}} </td>

<td></td>

<td></td>

</tr>

<tr class="table-info">

<td>Current Year:</td>

<td> {{ $date->year }} </td>


<td>Current Month</td>

<td> {{ $date->format('F') }} </td>
</tr>

</tbody>
</table>

@if($mprdurationstatus == 'Opened')

<table class="table table-bordered">

    <thead>
      <tr >
        <th>Projects</th>
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
  
  @foreach($employee->projects as $project)

  @php

  $counter =0

  @endphp



    @foreach($project->parameters as $parameter)

<tr>
 

@if($counter==0)


    
<td rowspan="{{$project->noOfParam}}">
  @if(Gate::allows('finally-submitted') && !Auth::user()->isAdmin)

  {{  $project->projectname }}
  @else
<a href="{{ action('EmployeeController@createProgress', [$project->id]) }}">
 
 {{  $project->projectname }}

</a>
@endif



</td>

@endif

<td>{{ $parameter->parametername }}</td>

<td>work1</td>

<td>
 @if($parameter->progresses()->where('year_month', $date)->exists())
{{ $parameter->progresses()->where('year_month', $date)->value('progress')}}
@endif
</td>

<td>work3</td>

@if($counter==0)
    
<td rowspan="{{$project->noOfParam}}">

 Edit

 @endif


</tr>

@php

$counter++

@endphp

@endforeach

@endforeach

</tbody>

</table>



@if (Gate::allows('final-submit') && !Auth::user()->isAdmin && $employee->projects->isNotEmpty()) 

<a href="{{ action('EmployeeController@finalSubmit', [$employee->id]) }}" class="btn btn-info" role="button"> Final Submit </a>



@endif

@elseif($mprdurationstatus == 'NotGenerated')

MPR for current month Not generated or Closed.

@elseif($mprdurationstatus == 'wrong')

Something went wrong.

@endif

@endsection

@section('styling')

<!-- <style type="text/css">

.mprtable {
    border: 3px solid green;
}

</style> -->

@endsection