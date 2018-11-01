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

<td> <?php echo date('Y'); ?> </td>


<td>Current Month</td>

<td> <?php echo date('F'); ?> </td>
</tr>

</tbody>
</table>

@endsection