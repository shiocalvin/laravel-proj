@extends('layouts.centertech')


@section('content')
    
<div class="card">
  @include('partials.success')


 
  <div class="card-header">
    <div class="row">

      <div class="col-sm-6 col-md-6">    
        <h1><b>Hospitals Testing</b></h1>
      </div>

      <div class="col-sm-4 col-md-4"></div>

      <div class="col-sm-2 col-md-2">
      
      </div>

    </div>
  </div>
   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
          <tr style="color: white">
            <th>Bag id</th>
            <th></th>
           
            
          </tr>
       </thead>
       <tbody>
           @foreach ($bloodbags as $bloodbag)   
       <tr>
        <td>{{$bloodbag->blood_bag_id}}</td>
        <td><a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/bloodbag/hospital/testing/{{$bloodbag->blood_bag_id}}" class="btn text-white" style="background-color: darkred">TEST</a></td>
        
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



