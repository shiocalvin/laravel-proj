@extends('layouts.zone')

@section('content')

<div class="container">

  <div class="card">
  
    @include('partials.success')
      
 
   
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4 col-md-4">
              <h1>{{$hospital->hospital_name}}</h1>
            </div>

              <div class="col-sm-2 col-md-2"></div>

              <div class="col-sm-3 col-md-3"></div> 

                <div class="col-sm-3 col-md-3">
                <a href="/zone/{{$zone->id}}/hospital/{{$hospital->hospital_id}}/labtechnician/create" class="btn float-right text-white " style="background-color: darkred" >Create Hospital laboratory technician</a>
                </div>

                   
        </div>
     </div>
     <!-- /.card-header -->
    
        <div class="col sm-8 col-md-8">
            <div class="card-body">
               
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: darkred" class="text-white">
                <tr>
                  <th>Region</th>
                  <th>District</th>
                  <th>Ward</th>
                </tr>
                </thead>
                <tbody>
                 
                <tr>
                <td><h5><strong>{{$hospital->region['name']}}</strong></h5></td>
                <td><h5><strong>{{$hospital->district['name']}}</strong></h5></td>
                <td><h5><strong>{{$hospital->ward['name']}}</strong></h5></td>
                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    
    
      <div class="col-sm-8 col-md-8">
        <div class="row">
          <div class="col-sm-8 col-md-8"></div>
          <div class="col-sm-4 col-md-4"> 
           
          </div>
        </div>  

        <hr>

          <div class="card-body">
           
            <table id="example2" class="table table-bordered table-striped">
              <thead class="text-white" style="background-color: darkred">
              <tr>
                <th>Hospital Laboratory Technicians</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
               
            
               @foreach ($hospitaltechs as $hospitaltech)
                   
               
               <tr>
               <td><h5><strong>{{$hospitaltech->first_name}} {{$hospitaltech->last_name}}</strong></h5></td>
               <td> <a href="/zone/{{$zone->id}}/hospital/{{$hospital->hospital_id}}/labtechnician/{{$hospitaltech->techs_id}}/edit" class="btn btn-secondary">Edit</a></td>
              <td> <button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$hospitaltech->techs_id}})">Delete</button></td>
               </tr>
              </tbody>
              
              @endforeach
            </table>


<form action="" method="POST" id="deleteCategoryform">

  @method('delete')

  @csrf

            <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: darkred">
        <h5 class="modal-title text-white"  id="deleteModalLabel">Delete Laboratory Technican</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p class="text-center text-bold" >
         Are you sure you want to delete this laboratory technician? 
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn text-white" style="background-color: darkred">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>

</form>

          </div>
      </div>

    
   <!-- /.card -->
 </div>
 
 
 


    
@endsection

@section('scripts')

<script>

  function handleDelete(id){

    var form = document.getElementById('deleteCategoryform')

    form.action= '/zone/hospital/labtechnician/' +id

    $('#deleteModal').modal('show')

    


  }


</script>
    
@endsection