@extends('layouts.zone')

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
      <a href="{{route('hospital.creates',$zone->id)}}" class="btn text-white float-right" style="background-color: darkred">Create Hospital</a>
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
           <th>Region</th>
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
         <td>{{$hospital->region['name']}}</td>
         <td><a href="/zone/{{$zone->id}}/hospital/active/{{$hospital->hospital_id}}" class="btn text-white" style="background-color: darkred">View</a></td>
         <td><a href="/zone/{{$zone->id}}/hospital/active/{{$hospital->hospital_id}}/edit" class="btn btn-secondary" >Edit</a></td>
         <td> 

          {{Form::open(['method'=>'patch','action'=>['ZoneHospitalController@updateactive',$hospital->hospital_id]])}}


            {{Form::hidden('name',$hospital->hospital_name)}}
            {{Form::hidden('region_id',$hospital->region)}}
            {{Form::hidden('district_id',$hospital->district)}}
            {{Form::hidden('ward_id',$hospital->ward)}}


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