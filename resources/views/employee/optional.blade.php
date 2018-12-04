@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection



@section('content')

@include('errors.error')

<hr/>

{!! Form::open(['action' => 'EmployeeController@storeOptional']) !!}

<!-- New Central Projects -->

<h5>New Central Projects implemented in the state during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Project/Scheme Name</th>
        <th>Highlights</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="schemename_central">
 @if($employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',0]
 ])->exists())
{{$employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',0]
 ])->value('schemename')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="highlight_central">
 @if($employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',0]
 ])->exists())
{{$employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',0]
 ])->value('highlight')}}
@endif
  </textarea>
</div>  
</td>
  

</tr>

</table>

<h5>New State Specific Projects implemented in the state during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Project/Scheme Name</th>
        <th>Highlights</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="schemename_state">
 @if($employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',1]
 ])->exists())
{{$employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',1]
 ])->value('schemename')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="highlight_state">
 @if($employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',1]
 ])->exists())
{{$employee->newprojects()->where([
 ['year_month', '=',$date],
 ['central_state', '=',1]
 ])->value('highlight')}}
@endif
  </textarea>
</div>  
</td>
  

</tr>

</table>

@if (Gate::allows('final-submit') &&  $employee->projects->isNotEmpty()) 

<div class="form-group">
	{!! Form::submit("Save Progress", ['class' => 'btn btn-info form-control']) !!}
</div>

@endif

<div class="form-group">
  {!! Form::hidden('emp', $employee->id, ['class' => 'form-control', 'required']) !!}
</div>



{!!Form::close() !!}


@endsection