@extends('layouts.overall')

@section('content')

<div class="container">
    <div class="row">   
   <div class="col-sm-3 col-md-3"></div>
    
   <div class="col-sm-6 col-md-6" style="margin-top: 10%">
   
   <div class="card">
   
     <div class="card-header text-white" style="background-color: darkred" ><strong>New Memo</strong></div> 
     <div class="card-body"> 
         @include('partials.errors')
   
           {{ Form::open([ 'method'=>'post','action'=>'AdmemoController@store'])}}
   
           <div class="form-group row">
               {{Form::label('content','Content:')}}
               {{Form::textArea('content',null,['class'=>'form-control','placeholder'=>'Write a memo' ])}}
   
           </div>
   
           
   
           <div class="form-group row float-right">
           {{Form::submit('Submit Memo',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}
   
           </div>
   
   
           {{Form::close()}}
   
       </div>
   
   </div>
   
   </div>
   
   <div class="col-sm-3 col-md-3"></div>
   
   
   </div>
   
   </div>
   
    
@endsection