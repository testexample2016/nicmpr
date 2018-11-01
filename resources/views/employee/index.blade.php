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

<td>Employee Name:</td>

<td> {{$employee->name}}</td>

<td></td>

<td></td>

</tr>

 <tr class="table-info">

<td>Designation: </td>

<td> {{$employee->designation}} </td>

<td></td>

<td></td>

</tr>

<tr class="table-info">

<td>Current Year:</td>

<td> {{ Carbon\Carbon::now()->format('Y') }} </td>


<td>Current Month</td>

<td>  {{ Carbon\Carbon::now()->format('F') }} </td>
</tr>

</tbody>
</table>

<table class="table table-bordered table-hover mprtable" >
    <thead class="mprtable">
      <tr >
        <th>Projects</th>
        <th>Parameters</th>
        <th>Previous Month</th>
        <th>Reporting Month</th>
        <th>Actions</th>
        <th>Projects</th>
      </tr>
    </thead>

  <tbody class="mprtable">

      
      
 @foreach($employee->projects as $project)

<tr class="table-info mprtable">

  <td class="mprtable" >{{  $project->projectname }}</td>

  <td class="mprtable">
    
<ul>

@foreach($project->parameters as $parameter)

<li>

{{$parameter->parametername}}

</li>

@endforeach

</ul>


  </td>

  <td>
    

  </td>

</tr>


@endforeach



</tbody>
</table>



@endsection

@section('styling')

<style type="text/css">

.mprtable {
    border: 3px solid green;
}

</style>

@endsection