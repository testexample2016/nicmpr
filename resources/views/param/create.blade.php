@extends('layouts.master')

@section('title')

  Welcome! Admin

@endsection



@section('content')

@include('errors.error')

<h1>Create Project Parameter</h1>

<hr/>

{!! Form::open(['action' => 'ParamController@store']) !!}

@include('param.userform', ['submitButtonText' => 'Add Parameters'])


{!!Form::close() !!}


@endsection

@section('script')

<script>
   
function GetDynamicTextBox() {
           return '<br><input name = "parameters[]" type="text" class="form-control"  /></br>';
       }

       $(document).ready(function(){
         $("#project").change(function(){

         	var x = document.getElementById("project").selectedIndex;
            var y = document.getElementById("project").options;

            var z = y[x].getAttribute("param");

           document.getElementById("TextBoxContainer").innerHTML = "";

            for (var i = 0; i < z; i++) {

            var div = document.createElement('DIV');
           div.setAttribute("class", "form-group");
            div.innerHTML = GetDynamicTextBox();

           document.getElementById("TextBoxContainer").appendChild(div);

  }
       });

         });

</script>


@endsection