@extends('layouts.hospital')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">
  

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Send Request</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

      {{ Form::open([ 'method'=>'post','action'=>'HospitalRequestController@store'] ) }}


        
        {{Form::hidden('centre_id',$hospital->centre_under_id)}}
        {{Form::hidden('req_hospital_name',$hospital->hospital_name)}}
        {{Form::hidden('hospital_id',$hospital->hospital_id)}}
 

       
        
        <div class="form-group row float-right">
          {{Form::submit('Request for blood bags ',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}
  
        </div>
      

        {{Form::close()}}



    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>

</div>
@endsection

