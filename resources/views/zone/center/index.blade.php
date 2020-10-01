@extends('layouts.zone')

@section('content')


<div class="card">
    @include('partials.success')
      
 
   
    <div class="card-header">
      <div class="row">

        <div class="col-sm-4 col-md-4">    
          <h1><b> Active Centers</b></h1>
        </div>

        <div class="col-sm-6 col-md-6"></div>

        <div class="col-sm-2 col-md-2">
        <a href="{{route('center.creates',$zone->id)}}" class="btn text-white float-right" style="background-color: darkred">Create Center</a>
        </div>

      </div>
    </div>
     <!-- /.card-header -->
     <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">
         <thead style="background-color: darkred">
         <tr style="color: white">
           <th>Center_id</th>
           <th>Center_name</th>
           
          
           <th></th>
           <th></th>
           <th></th>
         </tr>
         </thead>
         <tbody>
           @foreach ($centers as $center) 
         <tr>
           
         <td>{{$center->centre_id}}</td>
         <td>{{$center->name}}</td>
         <td><a href="/zone/{{$zone->id}}/center/active/{{$center->centre_id}}" class="btn text-white" style="background-color: darkred">View</a></td>
         <td><a href="/zone/{{$zone->id}}/center/active/{{$center->centre_id}}/edit" class="btn btn-secondary" >Edit</a></td>
         <td> 


          {{Form::open(['method'=>'patch','action'=>['ZoneCenterController@updateactive',$center->centre_id]])}}

           {{Form::hidden('name',$center->name)}}
           {{Form::hidden('region_id',$center->region_id)}}
           {{Form::hidden('district_id',$center->district_id)}}
           {{Form::hidden('ward_id',$center->ward_id)}}


           {{Form::hidden('is_active',0)}}

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