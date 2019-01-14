@extends('layouts.master')

@section('title')

  @if(Auth::user()->isAdmin)
   
    Welcome! Admin
  @else 

     Welcome! Employee

@endif

@endsection



@section('content')

@include('errors.error')

<hr/>

{!! Form::open(['action' => 'TrainingController@storeTraining']) !!}

<!-- New Central Projects -->

<h5>Major Trainings during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Date of Training</th>
        <th>No of Days of Training</th>
        <th>Training Provided By</th>
        <th>Training Attended By</th>
        <th>Brief Description of Training</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="date_of_training">
 @if($employee->trainings()->where('year_month', '=',$date )->exists())
{{$employee->trainings()->where('year_month', '=',$date )->value('date_of_training')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="days_of_training">
 @if($employee->trainings()->where('year_month', '=',$date )->exists())
{{$employee->trainings()->where('year_month', '=',$date )->value('days_of_training')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="provided_by">
 @if($employee->trainings()->where('year_month', '=',$date )->exists())
{{$employee->trainings()->where('year_month', '=',$date )->value('provided_by')}}
@endif
  </textarea>
</div>  
</td>


<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="attended_by">
 @if($employee->trainings()->where('year_month', '=',$date )->exists())
{{$employee->trainings()->where('year_month', '=',$date )->value('attended_by')}}
@endif
  </textarea>
</div>  
</td>


<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="description">
 @if($employee->trainings()->where('year_month', '=',$date )->exists())
{{$employee->trainings()->where('year_month', '=',$date )->value('description')}}
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