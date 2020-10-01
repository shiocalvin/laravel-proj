@extends('layouts.center')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 

<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Edit Blood Drive</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')


     
         {{ Form::model($drive,[ 'method'=>'patch','action'=>['BloodDriveController@update',$drive->blood_drive_id]])}}

        <div class="form-group row">
            {{Form::label('name','Blood drive Name:')}}
            {{Form::text('name',$drive->blood_drive_name,['class'=>'form-control','placeholder'=>'Enter Drive name' ])}}

        </div>
   
       

        <div class="form-group row">
            {{Form::label('Days','Number of days:')}}
            {{Form::number('days',$drive->number_days,['class'=>'form-control ' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Start date','Starting date:')}}
            {{Form::date('startDate',$drive->start_date,['class'=>'form-control'])}}
        </div>

        <div class="form-group row">
            {{Form::label('End date','Ending Date:')}}
            {{Form::date('endDate',$drive->end_date,['class'=>'form-control'])}}
        </div>



        {{Form::hidden('centre_id',$center->centre_id)}}

        {{Form::hidden('status',$drive->status)}}

        

        <div class="form-group row float-right">
        {{Form::submit('Edit Drive',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
        
        


        {{Form::close()}} 

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>



@endsection

