@extends('layouts.master')

@section('title')

  Welcome! Dynamic Search

@endsection



@section('content')

@include('errors.error')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1>Dynamic Search</h1>

<hr/>

{!! Form::open(['action' => 'GenerateController@searchPDF']) !!}

<div class="form-group">

<div class="form-row">

  <div class="col">

View MPR for (month and year): <input type="month" name="search_year_month">

  </div>

</div>

</div>
  
 <div class="form-group">
	{!! Form::submit('Submit', ['class' => 'btn btn-primary ' ]) !!}
</div>


{!!Form::close() !!}

@endsection