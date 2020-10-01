@extends('layouts.center')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 

<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>New Blood Drive</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')


     
         {{ Form::open([ 'method'=>'post','action'=>'BloodDriveController@store'])}}

        <div class="form-group row">
            {{Form::label('name','Blood drive Name:')}}
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Drive name' ])}}

        </div>
   
       

        <div class="form-group row">
            {{Form::label('Days','Number of days:')}}
            {{Form::number('days',null,['class'=>'form-control ' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Start date','Starting date:')}}
            {{Form::date('startDate',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group row">
            {{Form::label('End date','Ending Date:')}}
            {{Form::date('endDate',null,['class'=>'form-control'])}}
        </div>



     

        

        <div class="form-group row float-right">
        {{Form::submit('Create Drive',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
        
        {{Form::hidden('centre_id',$center->centre_id)}}


        {{Form::close()}} 

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>



@endsection

