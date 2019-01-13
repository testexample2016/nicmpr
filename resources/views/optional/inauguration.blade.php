@extends('layouts.master')

@section('title')

   @if(Auth::user()->isAdmin)
   
    Welcome! Amdmin
  @else 

     Welcome! Employee

@endif

@endsection



@section('content')

@include('errors.error')

<hr/>

{!! Form::open(['action' => 'InaugurationController@storeInauguration']) !!}

<!-- New Central Projects -->

<h5>Major Inaugurations during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Date of Inauguration</th>
        <th>Inaugurated By</th>
        <th>Brief Description</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="date_of_inauguration">
 @if($employee->inaugurations()->where('year_month', '=',$date )->exists())
{{$employee->inaugurations()->where('year_month', '=',$date )->value('date_of_inauguration')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="inaugurated_by">
 @if($employee->inaugurations()->where('year_month', '=',$date )->exists())
{{$employee->inaugurations()->where('year_month', '=',$date )->value('inaugurated_by')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="description">
 @if($employee->inaugurations()->where('year_month', '=',$date )->exists())
{{$employee->inaugurations()->where('year_month', '=',$date )->value('description')}}
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