@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')


<table class="table table-bordered">

    <thead>
      <tr >
      	<th>Sr. No.</th>
        <th>Projects</th>
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
        
      </tr>
    </thead>

    <tbody>

  @foreach($employees as $employee)
  
  @foreach($employee->projects as $project)

  @php

  $counter =0

  @endphp


    @foreach($project->parameters as $parameter)

<tr>
 

@if($counter==0)

<td rowspan="{{$project->noOfParam}}">
  @php	
    
    static $i=1;
    
    echo $i;

    $i++;

    @endphp
</td>

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

<td>
  @if($parameter->progresses()->where('year_month', $date->copy()->subMonth())->exists())
{{ $parameter->progresses()->where('year_month', $date->copy()->subMonth())->value('progress')}}
@else
NILL
@endif
</td>

<td>
 @if($parameter->progresses()->where('year_month', $date)->exists())
{{ $parameter->progresses()->where('year_month', $date)->value('progress')}}
@endif
</td>

<td>@if($parameter->cumulative)
{{$parameter->cumulative->cumulative}}
@endif
</td>



</tr>

@php

$counter++

@endphp

@endforeach

@endforeach

@endforeach

</tbody>

</table>



@endsection