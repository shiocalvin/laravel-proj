@extends('layouts.centertech')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">
   
<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Donation</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

      {{ Form::model($bloodbag,[ 'method'=>'post','action'=>['DonorsController@hospresultstore',$center->centre_id,$centertech->employee_id]] ) }}


        <div class="form-group row">
            {{Form::label('bag id','Blood bag id:')}}
            {{Form::text('bag_id',$bloodbag->blood_bag_id,['class'=>'form-control','readonly'])}}

        </div>
        
         <div class="form-group row">
            {{Form::label('Bloodtype','Blood type:')}}
            {{Form::select('blood_type',array('A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-','RH-null'=>'RH-null'),null,['class'=>'form-control' ])}}
        </div>

         <div class="form-group row">
            {{Form::label('Results','Results:')}}
            {{Form::select('result',array('valid'=>'valid','permanently invalid'=>'permanently invalid','sample corrupted'=>'sample corrupted'),null,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('comment','Comment:')}}
            {{Form::textarea('comment',null,['class'=>'form-control'])}}

        </div>

        {{Form::hidden('taken_at_id',$bloodbag->hospital_id)}}
        {{Form::hidden('testing_centre_id',$center->centre_id)}}
        {{Form::hidden('donor_id',$bloodbag->donor_id)}}
        {{Form::hidden('taken_at',$bloodbag->taken_on)}}
        {{Form::hidden('testing_centre_lab_tech',$centertech->employee_id)}}
        {{Form::hidden('hosp_centre','hosp')}}
        {{Form::hidden('expires_in',$bloodbag->expires_in)}}
 

        <div class="form-group row float-right">
        {{Form::submit('Submit results',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}
      

        {{Form::close()}}



    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>

@endsection

