@extends('layouts.center')

@section('content')


<div class="card">
    @include('partials.success')
 
    
        
 
       
 
   
    <div class="card-header">
      <div class="row">

      <div class="col-sm-4 col-md-4">    
        <h1><b>Active Hospitals</b></h1>
      </div>

      <div class="col-sm-6 col-md-6"></div>

      <div class="col-sm-2 col-md-2">
      <a href="{{route('hospital.creates',$center->centre_id)}}" class="btn text-white float-right" style="background-color: darkred">Create Hospital</a>
      </div>

    </div>
    </div>
     <!-- /.card-header -->
     <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">
         <thead style="background-color: darkred">
         <tr style="color: white">
           <th>Hospital_id</th>
           <th>Hospital_name</th>
           
           <th></th>
           <th></th>
           <th></th>
         </tr>
         </thead>
         <tbody>
           @foreach ($hospitals as $hospital) 
         <tr>
           
         <td>{{$hospital->hospital_id}}</td>
         <td>{{$hospital->hospital_name}}</td>
        
         <td><a href="/center/{{$center->centre_id}}/hospital/active/{{$hospital->hospital_id}}" class="btn text-white" style="background-color: darkred">View</a></td>
         <td><a href="/center/{{$center->centre_id}}/hospital/active/{{$hospital->hospital_id}}/edit" class="btn btn-secondary" >Edit</a></td>
         <td> 

          {{Form::open(['method'=>'patch','action'=>['ZoneHospitalController@updateactive',$hospital->hospital_id]])}}


            {{Form::hidden('name',$hospital->hospital_name)}}
            {{Form::hidden('region_id',$hospital->region_id)}}
            {{Form::hidden('district_id',$hospital->district_id)}}
            {{Form::hidden('ward_id',$hospital->ward_id)}}


            <input type="hidden" name="is_active" value="0">

          {{Form::submit('Deactivate',['class'=>'btn btn-info'])}}

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