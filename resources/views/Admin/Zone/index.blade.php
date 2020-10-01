@extends('layouts.overall')

@section('content')



<div class="card">
   @include('partials.success')

   
       

      

  
   <div class="card-header">
    <h1><b>Zones</b></h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead style="background-color: darkred">
        <tr style="color: white">
          <th>Zone_id</th>
          <th>Zone_name</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($zones as $zone) 
        <tr>
        <td>{{$zone->id}}</td>
        <td>{{$zone->zone_name}}</td>
        <td><a href="{{route('zone.show',$zone->id)}}" class="btn text-white" style="background-color: darkred">View</a></td>
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