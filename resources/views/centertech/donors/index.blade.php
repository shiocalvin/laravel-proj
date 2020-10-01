@extends('layouts.centertech')


@section('content')
    
<div class="card">
  @include('partials.success')


 
  <div class="card-header">
    <div class="row">

      <div class="col-sm-6 col-md-6">    
        <h1><b> Donors</b></h1>
      </div>

      <div class="col-sm-4 col-md-4"></div>

      <div class="col-sm-2 col-md-2">
      <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/create" class="btn text-white float-right" style="background-color: darkred">Create Donor</a>
      </div>

    </div>
  </div>
   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
          <tr style="color: white">
            <th>Donor_id</th>
            <th>Nida_id</th>
            <th>Name </th>
            <th></th>
           
            
            
          </tr>
       </thead>
       <tbody>
          @foreach ($donors as $donor)  
       <tr>
       <td>{{$donor->donor_id}}</td> 
       <td>{{$donor->donors_nida}}</td>
       <td>{{$donor->first_name}} {{$donor->middle_name}} {{$donor->last_name}}</td>
       <td> <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/{{$donor->donor_id}}/edit" class="btn text-white" style="background-color: darkred">Edit</a></td>
      
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



