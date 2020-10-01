@extends('layouts.center')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred"  ><strong>New Zone</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

        {{ Form::model($centerlabtech,[ 'method'=>'patch','action'=>['CenterLabController@update',$centerlabtech->employee_id]]) }}

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
            {{Form::text('nida',$centerlabtech->employees_nida,['class'=>'form-control','placeholder'=>'Enter Nida id' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('first_name','First name:')}}
            {{Form::text('first_name',$centerlabtech->first_name,['class'=>'form-control','placeholder'=>'Enter First name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('last_name','Last name:')}}
            {{Form::text('last_name',$centerlabtech->last_name,['class'=>'form-control','placeholder'=>'Enter Last name' ])}}

        </div>

        <div class="form-group row">
            {{Form::label('Gender','Gender:')}}
            {{Form::select('gender',array('male'=>'male','female'=>'female'),$centerlabtech->sex,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Dateofbirth','Date of Birth:')}}
            {{Form::date('date_of_birth',$centerlabtech->dob,['class'=>'form-control'])}}
        </div>

        {{-- <div class="form-group row">
            {{Form::label('Position','Position:')}}
            {{Form::select('position',array('zonaldir'=>'Zonal Director','nbtsdir'=>'Centre Director','nbtslab'=>'Centre Laboratory Technician'),['class'=>'form-control' ])}}
        </div> --}}

        {{Form::hidden('position','nbtslab')}}

        
        

        <div class="form-group row float-right">
        {{Form::submit('Edit Lab technician',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
       



        {{Form::close()}}

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection