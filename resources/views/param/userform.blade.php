
<div class="form-group">
    {!! Form::Label('project', 'Project:') !!}
 </div>

<div class="form-group">

   <select class="form-control" id="project" name="project">

   <option value="null" class="form-group">Please Select</option>

   @foreach ($projects_unmapped as $project)

   <option value="{{ $project->id  }}" param="{{ $project->noOfParam }}">

   	{{$project->projectname}}</option>
   
  @endforeach

    </select>
 
</div>



<div class="form-group">

	<div id="TextBoxContainer"></div>

</div>


<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control' ]) !!}
</div>
