@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

@if($mprdurationstatus == 'Opened')

@php

$flag=true;

@endphp

<h2>MPR Status</h2>

<table class="table table-hover">

	<thead>
      <tr>
        <th>Employee Name</th>
        <th>Designation</th>
        <th>Status</th>
       
      </tr>
    </thead>

     <tbody>

     	@foreach ($employees as $employee)
      @if($employee->projects()->exists())
      <tr>
        @if (Gate::forUser($employee)->allows('finally-submitted')) 

          <td>
          <a href="{{ action('AdminController@show', [$employee->id]) }}"> {{ $employee->name }} </a>
        </td>
        <td>{{ $employee->designation }}</td>
        <td>Submitted <span>&#10004;</span></td>

   @else
       <td>{{ $employee->name }}</td>
       <td>{{ $employee->designation }}</td>
       <td>Not Submitted <span>&#10006;</span>  </td>
   @php
    
    $flag=false;

    @endphp

       @endif
      
      </tr>
      @endif
      @endforeach
      
    </tbody>


</table>

@if($flag && $employees->isNotEmpty())

<a href="{{ action('GenerateController@preview') }}" class="btn btn-info" role="button">Generate MPR Preview</a>

@endif


@endif


@endsection