@extends('layouts.center')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>New Laboratory technican</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

        {{ Form::open([ 'method'=>'post','action'=>'HospitalLabController@store'])}}

        <div class="form-group row">
            {{Form::label('nida','Nida id:')}}
            {{Form::text('nida',null,['class'=>'form-control','placeholder'=>'Enter Nida id' ])}}

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
            {{Form::select('gender',array('male'=>'male','female'=>'female'),['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Dateofbirth','Date of Birth:')}}
            {{Form::date('date_of_birth',null,['class'=>'form-control'])}}
        </div>

        {{-- <div class="form-group row">
            {{Form::label('Position','Position:')}}
            {{Form::select('position',array('zonaldir'=>'Zonal Director','nbtsdir'=>'Centre Director','nbtslab'=>'Centre Laboratory Technician'),['class'=>'form-control' ])}}
        </div> --}}

        

        <div class="form-group row float-right">
        {{Form::submit('Create Laboratory technician',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
        {{-- {{Form::hidden('position','hosplab')}} --}}

        {{-- {{Form::hidden('hospital_id',$hospital->hospital_id)}} --}}

        {{Form::hidden('hospital_id',$hospital->hospital_id)}}


        {{Form::close()}}

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection