@extends('layouts.centertech')

@section('content')



<div class="card">
   @include('partials.success')

   
       

      

  
   <div class="card-header">
    <h1><b>Requests</b></h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead style="background-color: darkred">
        <tr style="color: white">
          <th>Hospital id</th>
          <th>Hospital name</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($hospitals as $hospital) 
         
  
        <td>{{$hospital->req_hospital}}</td>
        <td>{{$hospital->req_hospital_name}}</td>
       
        <td>
            {{ Form::model($hospital,[ 'method'=>'patch','action'=>['CenterRequestController@update',$hospital->req_hospital]]) }}
    
            {{-- {{Form::text('req_stat',$hospital->req_stat,['class'=>'form-control'])}} --}}
            {{Form::hidden('req_stat','received')}}

            <div class="form-group row float-right">
            {{Form::submit('Received',['class'=>'btn text-white float-right','style'=>'background-color:#8b0000'])}}
    
            </div>
           
            {{Form::close()}}



        </td>
        </tr>
        @endforeach
        </tbody>
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>







@endsection