@extends('layouts.centertech')

@section('content')

<div class="container">
 <div class="row">   
<div class="col-sm-3 col-md-3"></div>
 
<div class="col-sm-6 col-md-6" style="margin-top: 10%">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/{{$donor->donor_id}}/bloodbag" class="btn text-white float-right"  style="background-color: darkred">View id</a>
            </div>
    </div>

<div class="card">

  <div class="card-header text-white" style="background-color: darkred" ><strong>Donation</strong></div> 
  <div class="card-body"> 
      @include('partials.errors')
      @include('partials.success')

      {{ Form::model($donor,[ 'method'=>'post','action'=>'DonorsController@updateuntested'] ) }}


        <div class="form-group row">
            {{Form::label('donor id','Donor id:')}}
            {{Form::text('donor_id',$donor->donor_id,['class'=>'form-control','readonly'])}}

        </div>
        {{Form::hidden('centre_id',$center->centre_id)}}
 

        <div class="form-group row float-right">
        {{Form::submit('Request blood bag id',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}

       

        {{Form::close()}}



    </div>

</div>

</div>

<div class="col-sm-3 col-md-3"></div>


</div>

</div>
</div>

@endsection

