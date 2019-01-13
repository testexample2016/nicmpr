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

{!! Form::open(['action' => 'ReviewController@storeReview']) !!}

<!-- New Central Projects -->

<h5>Reviews of State by Hon'ble Minister/Secretary/DG:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Reviewer Name</th>
        <th>Date Of Date</th>
        <th>Designation of Reviewer</th>
        <th>Brief Description of Review</th>
        <th>Suggestion Given by Reviewer</th>
        <th>Target Given by Reviewer</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="reviewer_name">
 @if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('reviewer_name')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="date_of_review">
@if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('date_of_review')}}
@endif
  </textarea>
</div>  
</td>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="designation">
@if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('designation')}}
@endif
  </textarea>
</div>  
</td>


<td>
    <div class="form-group">
  <textarea class="form-control" rows="5"  name="description">
@if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('description')}}
@endif
  </textarea>
</div>  
</td>

<td>
  <div class="form-group">
  <textarea class="form-control" rows="5"  name="suggestion">
@if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('suggestion')}}
@endif
  </textarea>
</div>  
</td>

<td>
  <div class="form-group">
  <textarea class="form-control" rows="5"  name="target">
@if($employee->reviews()->where('year_month', '=',$date )->exists())
{{$employee->reviews()->where('year_month', '=',$date )->value('target')}}
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