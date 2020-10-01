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


     
         {{ Form::open([ 'method'=>'post','action'=>'ZoneCenterController@store'])}}

        <div class="form-group row">
            {{Form::label('name','Center Name:')}}
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Center name' ])}}

        </div>
        

        

     
        <div class="form-group row">
            {{Form::label('Region','Region:')}}
            {{Form::select('region_id',$regionsoptions,null,['class'=>'form-control' ])}}
        </div>
        

        
        <div class="form-group row">
            {{Form::label('District','District:')}}
            {{Form::select('district_id',$districts,null,['class'=>'form-control'])}}
        </div>
        

        
        <div class="form-group row">
            {{Form::label('Ward','Ward:')}}
            {{Form::select('ward_id',$wards,null,['class'=>'form-control' ])}}
        </div>
        

        
        <div class="form-group row float-right">
        {{Form::submit('Create Center',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

        </div>
       
        {{Form::hidden('zone_id',$zone->id)}} 


        {{Form::close()}} 

    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>





@endsection


{{-- @section('scripts')

<script>
$('#region').on('change',function(e){

console.log(e);

var reg_id = e.target.value;

//ajax
$.get('/ajax-district?reg_id='$reg_id,function($data){

    //success
    $('#district').empty();
    $.each(data,function(index,districtObj){


    $('#district').append('<option value ="'+districtObj.id+'"> '+districtObj.name+'</option>');

    });

 

})


});












</script>

</d --}}
{{-- @endsection --}}

