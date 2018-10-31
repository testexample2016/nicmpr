<div class="form-group">
	{!! Form::label('projectname', 'Project Name:') !!}
	{!! Form::text('projectname', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('noOfParam', 'No of Parameter:') !!}
	{!! Form::text('noOfParam', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::Label('user', 'User:') !!}
    {!! Form::select('user', $users , null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control' ]) !!}
</div>