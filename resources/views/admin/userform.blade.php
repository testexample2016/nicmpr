<div class="form-group">
	{!! Form::label('name', 'Employee Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('designation', 'Employee Designation') !!}
	{!! Form::text('designation', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Employee Email') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Employee Password') !!}
	{!! Form::text('password', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control' ]) !!}
</div>