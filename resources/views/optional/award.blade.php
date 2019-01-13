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

{!! Form::open(['action' => 'AwardController@storeAward']) !!}

<!-- New Central Projects -->

<h5>Major Awards received during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Award Name</th>
        <th>Date Of Award</th>
        <th>Project Name and Recognition</th>
        <th>Brief Description of Award</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="award_name">
 @if($employee->awards()->where('year_month', '=',$date )->exists())
{{$employee->awards()->where('year_month', '=',$date )->value('award_name')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="date_of_award">
@if($employee->awards()->where('year_month', '=',$date )->exists())
{{$employee->awards()->where('year_month', '=',$date )->value('date_of_award')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="project_name_regcognition">
@if($employee->awards()->where('year_month', '=',$date )->exists())
{{$employee->awards()->where('year_month', '=',$date )->value('project_name_regcognition')}}
@endif
  </textarea>
</div>  
</td>


<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="description">
@if($employee->awards()->where('year_month', '=',$date )->exists())
{{$employee->awards()->where('year_month', '=',$date )->value('description')}}
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