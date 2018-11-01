@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection


@section('content')

{{$employee->name}}


  
      
 @foreach($employee->projects as $project)

 <table class="table " width="100%">

<tr>

<td width="15%" > {{  $project->projectname }}</td>

<td width="80%">

  <table class="table" >

     <thead >
      <tr >
        
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Cumulative Since Inspection</th>
        
      </tr>
    </thead>

@foreach($project->parameters as $parameter)

  <tr>
    <td >{{$parameter->parametername}}</td>
    <td >work1</td>
    <td >workkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk2</td>
    <td>work3</td>


  </tr>

@endforeach

</table>
</td>

<td width="5%">Edit</td>

</tr>

</table>

@endforeach

@endsection

@section('styling')

<style type="text/css">

table, th, td, thead {
     border: 3px solid green;
}


table, td, th, tr 
{
  /*table-layout:fixed;*/
  /*width:20px;*/
  overflow:hidden;
  word-wrap:break-word;
}

</style>

@endsection