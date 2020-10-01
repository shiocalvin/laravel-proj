@extends('layouts.center')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Edit Hospital</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')


      {{-- <form action="{{ route("center.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="region">Region</label>
            <select name="region_id" id="region" class="form-control">
                @foreach($regions as $id => $region)
                    <option value="{{ $id }}">
                        {{ $region }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
            <label for="district">District</label>
            <select name="district_id" id="district" class="form-control">
                <option value="">{{ trans('global.pleaseSelect') }}</option>
            </select>
            @if($errors->has('district_id'))
                <p class="help-block">
                    {{ $errors->first('district_id') }}
                </p>
            @endif
        </div> --}}

         {{ Form::model($hospital,[ 'method'=>'patch','action'=>['ZoneHospitalController@updateactive',$hospital->hospital_id]] ) }}

        <div class="form-group row">
            {{ Form::label('name','Hospital Name:') }}
            {{ Form::text('name',$hospital->hospital_name,['class'=>'form-control' ]) }}

        </div>

        

       

        <div class="form-group row">
            {{Form::label('Region','Region:')}}
            {{Form::select('region_id',$regionsoptions,$hospital->region_id,['class'=>'form-control region' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('District','District:')}}
            {{Form::select('district_id',$districtsoptions,$hospital->district_id,['class'=>'form-control' ])}}
        </div>

        <div class="form-group row">
            {{Form::label('Ward','Ward:')}}
            {{Form::select('ward_id',$wardsoptions,$hospital->ward_id,['class'=>'form-control' ])}}
        </div>

        {{-- <div class="form-group row">
            {{Form::label('Position','Position:')}}
            {{Form::select('position',array('zonaldir'=>'Zonal Director','nbtsdir'=>'Centre Director','nbtslab'=>'Centre Laboratory Technician'),['class'=>'form-control' ])}}
        </div> --}}

        

        <div class="form-group row float-right">
        {{Form::submit('Edit Hospital',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
        {{-- {{Form::hidden('position','zonaldir')}}--}}

        {{Form::hidden('is_active',1)}} 

        {{-- {{Form::hidden('zone_id',1)}}  --}}


        {{Form::close()}} 

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection

