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
            <th>Number of donations</th>
            <th>Status</th>
            <th></th>
           
            
            
          </tr>

       </thead>
       <tbody>
          @foreach ($donors as $donor)  
       <tr>
       <td>{{$donor->donor_id}}</td>
       <td>{{$donor->donors_nida}}</td>
       <td>{{$donor->no_of_donations}}</td>
       <td>{{$donor->status}}</td>

       @if ($donor->status=='valid')
       <td><a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/donate/{{$donor->donor_id}}" class="btn btn-info">Donate</a></td> 
       @else
       <td></td>
       @endif
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



