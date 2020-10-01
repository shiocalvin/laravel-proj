@extends('layouts.zone')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>New Center</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')


         {{ Form::model($center,[ 'method'=>'patch','action'=>['ZoneCenterController@updateactive',$center->centre_id]])}}

        <div class="form-group row">
            {{Form::label('name','Center Name:')}}
            {{Form::text('name',$center->name,['class'=>'form-control','placeholder'=>'Enter Center name' ])}}

        </div>
       

        <div class="form-group row">
            {{Form::label('Region','Region:')}}
            {{Form::select('region_id',$regionsoptions,$center->region_id,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('District','District:')}}
            {{Form::select('district_id',$districts,$center->district_id,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Ward','Ward:')}}
            {{Form::select('ward_id',$wards,$center->ward_id,['class'=>'form-control' ])}}
        </div>

        

        <div class="form-group row float-right">
        {{Form::submit('Edit Center',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
        {{-- {{Form::hidden('position','zonaldir')}}--}}

        {{-- {{Form::hidden('zone_id',1)}}  --}}

        {{Form::hidden('is_active',1)}}


        {{Form::close()}} 

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection

