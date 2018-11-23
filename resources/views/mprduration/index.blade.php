@extends('layouts.master')

@section('title')

  Welcome! Admin in MPR Duration

@endsection



@section('content')

@include('errors.error')

<h1>Open/Close MPR</h1>

<hr/>

{!! Form::open(['action' => 'MprdurationController@store']) !!}

<div class="form-group">

<div class="form-row">

  <div class="col">

Open MPR for (month and year): <input type="month" name="open_year_month">

  </div>

  <div class="col">

Close MPR for (month and year): <input type="month" name="close_year_month">

 </div>

</div>

</div>
  
 <div class="form-group">
	{!! Form::submit('Submit', ['class' => 'btn btn-primary ' ]) !!}
</div>


{!!Form::close() !!}


<h2>MPR Duration</h2>

<table class="table table-hover">

	<thead>
      <tr>
        <th>Year Month</th>
        <th>Open/Closed</th>
      </tr>
   </thead>

     <tbody>

     	@foreach ($mprdurations as $mprduration)
      <tr>
        <td>{{ $mprduration->year_month }} </td>
        <td>
          @if($mprduration->closed)
          Closed
          @else
          Open
          @endif
        </td>
      </tr>

      @endforeach
      
    </tbody>


</table>


@endsection