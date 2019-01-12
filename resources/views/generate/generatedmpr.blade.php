<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Monthly Progress Report NIC Sikkim State Unit</title>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>

 <h5 style="text-align:center;">Monthly Progress Report NIC Sikkim State Unit</h5>

1. Existing Centre Projects running in the state    
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

2. New Centre Projects Implemented in the state during the month

<table class="table table-bordered style="width:100%"">
    <thead>
      <tr >
        <th style="width:40%">Project/Scheme/Programme Name</th>
        <th style="width:60%">Highlights</th>
            
      </tr>
    </thead>

  @foreach($employees as $employee)
  
  @foreach($employee->newprojects as $newproject)

  <tr>
    <td>
      {{$newproject->schemename}}
    </td>
    <td>
     {{ $newproject->highlight }}
    </td>
  </tr>

  @endforeach

  @endforeach

    <tbody>
    </tbody>
</table>


  </body>
</html>