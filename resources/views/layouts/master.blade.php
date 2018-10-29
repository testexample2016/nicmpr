<!DOCTYPE html>
<html>
    <head>
       

        <title>@yield('title')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <link rel="stylesheet" href="{{URL::to('src/css/main.css') }}">

     <style>
     
/*input:invalid {
  background-color: #ffdddd;
}*/
    </style>

       
    </head>
    
    <body>

      @include('includes.header')

     
       <div class="container">
        
          @yield('content')

       </div>
    </body>
</html>
