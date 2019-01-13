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

{!! Form::open(['action' => 'InitiativeController@storeInitiative']) !!}

<!-- New Central Projects -->

<h5>Major Meity Initiatives taken by the state during the month:</h5>
<hr/>

<table class="table table-bordered">
 <thead>
      <tr >
        <th>Initiatives</th>
      </tr>
    </thead> 

<tr>

<td>
    <div class="form-group">
  <textarea class="form-control" rows="5" name="initiative">
 @if($employee->initiatives()->where('year_month', '=',$date )->exists())
{{$employee->initiatives()->where('year_month', '=',$date )->value('initiative')}}
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