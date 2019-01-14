@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <nav class="navbar navbar-default">
  <div class="container-fluid">

     @if(Auth::user()->isAdmin)
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ action('AdminController@getDashboard') }}">Admin Dashboard</a>
    </div>

    <div class="navbar-header">
      <a class="navbar-brand" href="{{ action('MprdurationController@index') }}">MPR Open/Close</a>
    </div>

@endif

@unless(Auth::user()->isAdmin)
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ action('EmployeeController@index') }}">Employee Dashboard</a>
    </div>
@endunless
</div>
</nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
