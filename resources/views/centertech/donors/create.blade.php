@extends('layouts.centertech')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>New Donor</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

        {{ Form::open([ 'method'=>'post','action'=>'DonorsController@store'])}}

        <div class="form-group row">
            {{Form::label('nida','Nida id:')}}
            {{Form::text('nida',null,['class'=>'form-control','placeholder'=>'Enter Nida id' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('first_name','First name:')}}
            {{Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Enter First name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('middle_name','Middle name:')}}
            {{Form::text('middle_name',null,['class'=>'form-control','placeholder'=>'Enter Middle name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('last_name','Last name:')}}
            {{Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Enter Last name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('Region','Region:')}}
            {{Form::select('region_id',$regions,null,['class'=>'form-control ' ])}}
        </div>
        

        
        <div class="form-group row">
            {{Form::label('District','District:')}}
            {{Form::select('district_id',$districts,null,['class'=>'form-control' ])}}
        </div>
        

        
        <div class="form-group row">
            {{Form::label('Ward','Ward:')}}
            {{Form::select('ward_id',$wards,null,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Gender','Gender:')}}
            {{Form::select('gender',array('male'=>'male','female'=>'female'),null,['class'=>'form-control' ])}}
        </div>

        {{-- <div class="form-group row">
            {{Form::label('Bloodtype','Blood type:')}}
            {{Form::select('blood_type',array('A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-'),null,['class'=>'form-control' ])}}
        </div> --}}

        <div class="form-group row">
            {{Form::label('Date of Birth','Date of Birth:')}}
            {{Form::date('date_of_birth',null,['class'=>'form-control'])}}
        </div>

        {{Form::hidden('reg_centre_id',$center->centre_id)}}

        {{-- <div class="form-group row">
            {{Form::label('Position','Position:')}}
            {{Form::select('position',array('zonaldir'=>'Zonal Director','nbtsdir'=>'Centre Director','nbtslab'=>'Centre Laboratory Technician'),['class'=>'form-control' ])}}
        </div> --}}

        

        <div class="form-group row float-right">
        {{Form::submit('Create Donor',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

       

        {{Form::close()}}


    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection