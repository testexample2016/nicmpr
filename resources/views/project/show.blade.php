@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

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

</tr>

 <tr class="table-info">

<td>Employee Name: </td>

<td>

	 @if($project->user_id)


	{{$project->user->name}}


	@endif

</td>

</tr>

<tr class="table-info">

<td>Employee Designation:</td>

<td>
	 @if($project->user_id)

	{{$project->user->designation}}

	@endif

</td>

</tr>

<tr class="table-info">

  <td>Central/State Project:</td>

  <td>
    @if($project->central_state)
    State Project
    @else
    Central Project
    @endif
   </td>

</tr>


<tr class="table-info">

<td><h4>Parameters:</h4></td>

<td>

<ul>

@foreach($project->parameters as $parameter)

<li>

{{$parameter->parametername}}

</li>

@endforeach

</ul>

</td>
</tr>

</tbody>
</table>

@if(count($project->parameters)>0)

<a href="{{ action('ParamController@edit', [$project->id]) }}" class="btn btn-info" role="button"> Edit Parameters</a>

@endif

@endsection