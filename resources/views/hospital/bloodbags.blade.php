@extends('layouts.hospital')
 
 
@section('content')

<div class="card">
  @include('partials.success')


 
  <div class="card-header">
        <div class="row">

            <div class="col-sm-6 col-md-6">    
            <h1><b> Hospital Blood bags</b></h1>
            </div>

            <div class="col-sm-6 col-md-6"></div>

            
        </div>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
       <tr style="color: white">
         <th>Expiry_time</th>
         <th>blood type</th>
         <th>Blood bag id</th>
         <th></th>
      
        
         
       </tr>
       </thead>
       <tbody>
          @foreach ($bloodbags as $bloodbag)  
       <tr>
         
       
       <td>{{$bloodbag->days_left}}</td>
       <td>{{$bloodbag->blood_type}}</td>
       <td>{{$bloodbag->blood_bag_id}}</td>
       <td>
           {{Form::open(['method'=>'post','action'=>'HospitalRequestController@usebag'])}}

           {{Form::hidden('blood_bag_id',$bloodbag->blood_bag_id)}}
           {{Form::hidden('hospital_id',$bloodbag->hospital_id)}}
           {{Form::hidden('blood_type',$bloodbag->blood_type)}}
           {{Form::hidden('test_id',$bloodbag->test_id)}}

           {{Form::submit('USE',['class'=>'btn btn-info'])}}

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

















