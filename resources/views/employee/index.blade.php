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

<td> {{ Carbon\Carbon::now()->format('Y') }} </td>


<td>Current Month</td>

<td>  {{ Carbon\Carbon::now()->format('F') }} </td>
</tr>

</tbody>
</table>

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

<a href="{{ action('EmployeeController@createProgress', [$project->id]) }}">
 
 {{  $project->projectname }}


 @endif

</td>

<td>{{ $parameter->parametername }}</td>

<td>work1</td>

<td>work2</td>

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



@endsection

@section('styling')

<style type="text/css">

.mprtable {
    border: 3px solid green;
}

</style>

@endsection