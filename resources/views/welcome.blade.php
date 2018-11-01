@extends('layouts.master')

@section('title')

  Welcome!

@endsection


@section('content')

 @if(count($errors)>0)

<div class="row">

    <div class="col-md-4 offset-md-4">

        <ul>
            
            @foreach($errors->all() as $error)

              <li>{{ $error }}</li>

              @endforeach

        </ul>
        
    </div>

</div>

@endif

<h1>Welcome to NIC MPR </h1>

<h4>Please Create <span style="color:blue;font-weight:bold">User</span> or <span style="color:blue;font-weight:bold">Project</span> or Go to <span style="color:blue;font-weight:bold">Admin dashboard</span></h4>

@endsection