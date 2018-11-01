@extends('layouts.master')

@section('content')

@include('errors.error')

<h2>Edit Parameters of Project: {{ $project->projectname}}  </h2>


<hr/>

{!! Form::open(['method'=>'PATCH', 'action' => ['ParamController@update', $project->id]]) !!}



@foreach($project->parameters as $parameter)

<div class="form-group">
	
	{!! Form::text('parameters[]', $parameter->parametername , ['class' => 'form-control', 'required']) !!}

</div>

@endforeach


<div class="form-group">
	{!! Form::submit("Update Parameters", ['class' => 'btn btn-primary form-control' ]) !!}
</div>



{!!Form::close() !!}


@endsection

 