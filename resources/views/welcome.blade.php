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

hello

@endsection