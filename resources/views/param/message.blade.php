@extends('layouts.master')

@section('content')

@include('errors.error')

<h1>AjaxExample:  </h1>


<hr/>

<div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
      <?php
         echo Form::button('Replace Message',['id'=>'ajaxSubmit']);
      ?>




<script type="text/javascript">

	//event fire by after document load

	$(document).ready(function(){

		 $.ajaxSetup({

    		 headers: {
   				   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
   			 }); 

		  $.ajax({
                  url: "{{ url('/getmsg') }}",
                  method: 'post',
                  data: {

                  
                    
                  },

                  dataType: 'json',

                  success: function(result){

                     // alert(result.msg);

                     $("#msg").html(result.msg);
                  }});
               });
           
          
 </script>

 <!-- <script type="text/javascript"> -->
 //event fire by button click

 // $(document).ready(function(){
 //            $('#ajaxSubmit').click(function(e){
 //               e.preventDefault();

 //              $.ajaxSetup({

 //    		 headers: {
 //   				   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 			},
 //   			 }); 

 //               $.ajax({
 //                  url: "{{ url('/getmsg') }}",
 //                  method: 'post',
 //                  data: {

                  
                    
 //                  },

 //                  dataType: 'json',

 //                  success: function(result){

 //                     // alert(result.msg);

 //                     $("#msg").html(result.msg);
 //                  }});
 //               });
 //            });	


 <!-- </script> -->

 @endsection

             

              