@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')


<h5 style="text-align:center;">Monthly Progress Report NIC Sikkim State Unit</h5>

<h6>1. Existing Centre Projects running in the state</h6>  
<table class="table table-bordered">

    <thead>
      <tr >
        <th>Sr. No.</th>
        <th>Projects</th>
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
        
      </tr>
    </thead>

    <tbody>

  @foreach($project_central_generate as $project)
  

  @php

  $counter =0

  @endphp


    @foreach($project->parameters as $parameter)

<tr>
 

@if($counter==0)

<td rowspan="{{$project->noOfParam}}">
  @php  
    
    static $sr_projects=1;
    
    echo $sr_projects;

    $sr_projects++;

    @endphp
</td>

<td rowspan="{{$project->noOfParam}}">
  @if(Gate::allows('finally-submitted') && !Auth::user()->isAdmin)
  {{  $project->projectname }}
  @else
<a href="{{ action('EmployeeController@createProgress', [$project->id]) }}">
 {{  $project->projectname }}
</a>
@endif
</td>

@endif

<td>{{ $parameter->parametername }}
</td>

<td>
  @if($parameter->progresses()->where('year_month', $date->copy()->subMonth())->exists())
{{ $parameter->progresses()->where('year_month', $date->copy()->subMonth())->value('progress')}}
@else
NILL
@endif
</td>

<td>
 @if($parameter->progresses()->where('year_month', $date)->exists())
{{ $parameter->progresses()->where('year_month', $date)->value('progress')}}
@endif
</td>

<td>@if($parameter->cumulative)
{{$parameter->cumulative->cumulative}}
@endif
</td>



</tr>

@php

$counter++

@endphp

@endforeach

@endforeach

</tbody>

</table>

<h6>2. New Centre Projects Implemented in the state during the month</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Project/Scheme/Programme Name</th>
        <th >Highlights</th>
            
      </tr>
    </thead>

     <tbody>

  @foreach($newproject_central_generate as $newproject)
  
  

  <tr>
    <td>
       <div class="form-group">
        <textarea class="form-control">
      {{$newproject->schemename}}
    </textarea>
    </div>
    </td>
    <td>
       <div class="form-group">
         <textarea class="form-control">
     {{ $newproject->highlight }}
   </textarea>
   </div>
    </td>
  </tr>

 

  @endforeach

   
    </tbody>
</table>

<div style="page-break-after: always;"></div>

<h6>3. Existing State Specific Projects running in the state</h6>  
<table class="table table-bordered">

    <thead>
      <tr >
        <th>Sr. No.</th>
        <th>Projects</th>
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
        
      </tr>
    </thead>

    <tbody>

  @foreach($project_state_generate as $project)

  @php

  $counter =0

  @endphp


    @foreach($project->parameters as $parameter)

<tr>
 

@if($counter==0)

<td rowspan="{{$project->noOfParam}}">
  @php  
    
    static $state_projects=1;
    
    echo $state_projects;

    $state_projects++;

    @endphp
</td>

<td rowspan="{{$project->noOfParam}}">
@if(Gate::allows('finally-submitted') && !Auth::user()->isAdmin)
{{  $project->projectname }}
@else
<a href="{{ action('EmployeeController@createProgress', [$project->id]) }}">
 {{  $project->projectname }}
</a>
@endif

</td>

@endif

<td>{{ $parameter->parametername }}
</td>

<td>@if($parameter->progresses()->where('year_month', $date->copy()->subMonth())->exists())
{{ $parameter->progresses()->where('year_month', $date->copy()->subMonth())->value('progress')}}
@else
NILL
@endif
</td>

<td>@if($parameter->progresses()->where('year_month', $date)->exists())
{{ $parameter->progresses()->where('year_month', $date)->value('progress')}}
@endif
</td>

<td>@if($parameter->cumulative)
{{$parameter->cumulative->cumulative}}
@endif
</td>



</tr>

@php

$counter++

@endphp

@endforeach

@endforeach

</tbody>

</table>


<h6>4. New State Specific Projects Implemented in the state during the month</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Project/Scheme/Programme Name</th>
        <th >Highlights</th>
            
      </tr>
    </thead>

    <tbody>

  @foreach($newproject_state_generate as $newproject)
  

  <tr>
    <td>
       <div class="form-group">
        <textarea class="form-control">
      {{$newproject->schemename}}
    </textarea>
    </div>
    </td>
    <td>
       <div class="form-group">
         <textarea class="form-control">
     {{ $newproject->highlight }}
   </textarea>
   </div>
    </td>
  </tr>


  @endforeach

    
    </tbody>
</table>

<h6>5. New Development during this month (Developments during the month are to be showcased)</h6>

<h6>6. Major Inaugurations during this month(Inaugurations during the month are to be showcased)</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Sr No.</th>
        <th >Date of Inauguration</th>
        <th > Inaugurated by</th>
        <th >Brief Description</th>
            
      </tr>
    </thead>

  <tbody>

  @foreach($inauguration_generate as  $inauguration)
  


  <tr>
    <td>

       @php 
    
    static $sr_inaugurations=1;
    
    echo $sr_inaugurations;

    $sr_inaugurations++;

    @endphp
       
    </td>
    <td>
      {{$inauguration->date_of_inauguration}}
    </td>
    <td>
     {{$inauguration->inaugurated_by}}
    </td>
    <td>
     {{$inauguration->description}}
    </td>
  </tr>

  @endforeach


</tbody>
</table>

<h6>7. Major Trainings during this month(Trainings conducted during the month are to be showcased)</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Sr No.</th>
        <th >Number of days of training</th>
        <th > Training provided by</th>
        <th >Training attended by</th>
        <th >Brief description of Training</th>
            
      </tr>
    </thead>

  <tbody>

  @foreach($training_generate as $training)
  
  <tr>
    <td>

       @php 
    
    static $sr_trainings=1;
    
    echo $sr_trainings;

    $sr_trainings++;

    @endphp
       
    </td>
    <td>
      {{$training->date_of_training}}
    </td>
    <td>
     {{$training->days_of_training}}
    </td>
    <td>
     {{$training->provided_by}}
    </td>
    <td>
     {{$training->attended_by}}
    </td>
    <td>
     {{$training->description}}
    </td>
  </tr>

  @endforeach


</tbody>
</table>

<h6>8. Major Awards received this month(Awards won during the month are to be showcased)</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Sr No.</th>
        <th >Award Name</th>
        <th >Date of Award</th>
        <th >Project Name & Recognition</th>
        <th >Brief description of Award</th>
            
      </tr>
    </thead>

  <tbody>

 @foreach($award_generate as $award)
 
  <tr>
    <td>

       @php 
    
    static $sr_awards=1;
    
    echo $sr_awards;

    $sr_awards++;

    @endphp
       
    </td>
    <td>
      {{$award->award_name}}
    </td>
    <td>
     {{$award->date_of_award}}
    </td>
    <td>
     {{$award->project_name_regcognition}}
    </td>
    <td>
     {{$award->description}}
    </td>
  </tr>

  @endforeach


</tbody>
</table>


<h6>9. Major MeitY Initiatives taken by the state this month</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Sr No.</th>
        <th >Initiatives</th>         
      </tr>
    </thead>

  <tbody>

 @foreach($initiative_generate as $initiative)

  <tr>
    <td>

       @php 
    
    static $sr_initiatives=1;
    
    echo $sr_initiatives;

    $sr_initiatives++;

    @endphp
       
    </td>
    <td>
      {{$initiative->initiative}}
    
    </td>
    </tr>

  @endforeach


</tbody>
</table>

<h6>9. Reviews of State by Hon'ble Minister/Secretary/DG</h6>

<table class="table table-bordered" >
    <thead>
      <tr >
        <th >Sr No.</th>
        <th >Name of Reviewer</th>
        <th >Date of Review</th>
        <th >Designation Of Reviewer</th> 
        <th >Brief Description of Review</th>
        <th >Suggestion given by Reviewer</th> 
        <th >Target given by Reviewer(If any)</th>
      </tr>
    </thead>

  <tbody>

  

  @foreach($review_generate as $review)
  <tr>
    <td>

       @php 
    
    static $sr_reviews=1;
    
    echo $sr_reviews;

    $sr_reviews++;

    @endphp
       
    </td>
    <td>
      {{$review->reviewer_name}}
    
    </td>
    <td>
      {{$review->date_of_review}}
    
    </td>
    <td>
      {{$review->designation}}
    
    </td>
    <td>
      {{$review->description}}
    
    </td>
    <td>
      {{$review->suggestion}}
    
    </td>
    <td>
      {{$review->target}}
    
    </td>
    </tr>

    @endforeach

 

</tbody>
</table>

<a href="{{action('GenerateController@downloadPDF')}}" class="btn btn-info" role="button">Download Generated MPR</a>
<br>
<br>
<br>
<br>

@endsection

@section('styling')

<!-- <style type="text/css">
    
      table.table-bordered{
    border:1px solid black;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid black;
}
table.table-bordered > tbody > tr > td{
    border:1px solid black;
}
    </style> -->

@endsection