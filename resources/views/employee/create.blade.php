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

<td> {{ $date->year }} </td>


<td>Current Month</td>

<td>  {{ $date->format('F') }} </td>
</tr>



</tbody>
</table>

<h1>Create Progress:</h1>

<hr/>

<table class="table table-bordered">

	<thead>
      <tr >
        <th>Parameters</th>
        <!-- <th>Previous Month</th> -->
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
      </tr>
    </thead>

    <tbody>
	
@foreach($project->parameters as $parameter)

<tr>
	<td>{{ $parameter->parametername }}</td>

<!-- <td>
 <div class="form-group">
  <textarea class="form-control" rows="5" name="preMonth[{{$parameter->id}}]"></textarea>
</div>

</td> -->

<td>
 <div class="form-group">
  <textarea class="form-control" rows="5" name="repMonth[{{$parameter->id}}]">
@foreach($parameter->progresses as $progress)
@if($progress->year_month == $date)
{{ $progress->progress}}
@break
@endif
@endforeach
</textarea>
</div>
</td>

<td>
 <div class="form-group">
  <textarea class="form-control" rows="5" name="cumuInspection[{{$parameter->id}}]">
  @if($parameter->cumulative)
{{$parameter->cumulative->cumulative}}
@endif
  </textarea>
</div>
</td>
</tr>


@endforeach
</tbody>
</table>



<div class="form-group">
	{!! Form::submit("Save Progress", ['class' => 'btn btn-info form-control']) !!}
</div>

<div class="form-group">
  {!! Form::hidden('emp', $project->user_id, ['class' => 'form-control', 'required']) !!}
</div>



{!!Form::close() !!}


@endsection