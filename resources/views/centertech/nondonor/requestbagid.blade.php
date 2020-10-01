@extends('layouts.centertech')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/nondonor/show/bloodbag" class="btn text-white float-right"  style="background-color: darkred">View id</a>
            </div>
    </div>

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Donation</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

      {{ Form::open([ 'method'=>'post','action'=>'NonDonorController@store'] ) }}


        <div class="form-group row">
            {{Form::label('donor id','Temporary id:')}}
            {{Form::number('nondonor_id',null,['class'=>'form-control','placeholder'=>'Enter Temporary id'])}}

        </div>
        {{Form::hidden('centre_id',$center->centre_id)}}
 

        <div class="form-group row float-right">
        {{Form::submit('Request blood bag id',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

       

        {{Form::close()}}



    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>

@endsection

