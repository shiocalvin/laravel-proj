@extends('layouts.overall')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred"  ><strong>New Zone</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')

        {{ Form::model($zonedirector,[ 'method'=>'patch','action'=>['AdminZoneController@update',$zonedirector->employee_id]]) }}

        {{-- <div class="form-group row">
            {{Form::label('name','Name:')}}
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Zone name' ])}}

        </div>

        <div class="form-group row">

            {{Form::label('regions','Regions:')}}
            {{Form::select('regions[]',$regions,null,['class'=>'form-control regions-selector','multiple'=>'multiple' ])}}

        </div>

        <div class="form-group row float-right">
        {{Form::submit('Edit Zone',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div> --}}

        <div class="form-group row">
            {{Form::label('nida','Nida id:')}}
            {{Form::text('nida',$zonedirector->employees_nida,['class'=>'form-control','placeholder'=>'Enter Nida id' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('first_name','First name:')}}
            {{Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Enter First name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('last_name','Last name:')}}
            {{Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Enter Last name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('Gender','Gender:')}}
            {{Form::select('gender',array('male'=>'male','female'=>'female'),$zonedirector->sex,['class'=>'form-control'])}}
        </div>

        <div class="form-group row">
            {{Form::label('Dateofbirth','Date of Birth:')}}
            {{Form::date('date_of_birth',$zonedirector->dob,['class'=>'form-control'])}}
        </div>

        {{-- <div class="form-group row">
            {{Form::label('Position','Position:')}}
            {{Form::select('position',array('zonaldir'=>'Zonal Director','nbtsdir'=>'Centre Director','nbtslab'=>'Centre Laboratory Technician'),['class'=>'form-control' ])}}
        </div> --}}

         {{Form::hidden('position','zonaldir') }}

        {{-- {{Form::hidden('zone_id',$zone->id)}}  --}}
        

        <div class="form-group row float-right">
        {{Form::submit('Edit Zone Director',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
       



        {{Form::close()}}

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection