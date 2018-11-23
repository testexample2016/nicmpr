<header>
  
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

    <div class="navbar-header">
      <a class="navbar-brand" href="{{ action('AdminController@index') }}">User</a>
    </div>

    <div class="navbar-header">
      <a class="navbar-brand" href="{{ action('ProjectController@index') }}">Project</a>
    </div>
    
  </div>
</nav>
</header>