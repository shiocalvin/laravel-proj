@extends('layouts.center')

@section('content')


<div class="card">
    @include('partials.success')
           
       
 
   
    <div class="card-header">
      <div class="row">

      <div class="col-sm-7 col-md-7">    
        <h1><b>Inactive Hospitals</b></h1>
      </div>

      <div class="col-sm-3 col-md-3"></div>

      <div class="col-sm-2 col-md-2">
      
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
        
         <td><a href="" class="btn text-white" style="background-color: darkred">View</a></td>
 
         <td> 
             @if ($hospital->is_active == 0)
                 
             
            {{Form::open([ 'method'=>'patch','action'=>['ZoneHospitalController@updateactive',$hospital->hospital_id]])}}
             



            {{Form::hidden('name',$hospital->hospital_name)}}
            {{Form::hidden('region_id',$hospital->region_id)}}
            {{Form::hidden('district_id',$hospital->district_id)}}
            {{Form::hidden('ward_id',$hospital->ward_id)}}


            {{Form::hidden('is_active',1)}}

            

            {{Form::submit('Activate',['class'=>'btn btn-success'])}}


            {{Form::close()}}


            @endif

         </td>

         <td> <button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$hospital->hospital_id}})">Delete</button></td>
         
         </tr>
         @endforeach
         </tbody>
        
       </table>
     </div>
     <!-- /.card-body -->
   </div>
   <!-- /.card -->
 </div>


 <form action="" method="POST" id="deleteCategoryform">

    @method('delete')
  
    @csrf
  
              <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: darkred">
          <h5 class="modal-title text-white"  id="deleteModalLabel">Delete Hospital</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <p class="text-center text-bold" >
           Are you sure you want to delete this Center director? 
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

    form.action= '/zone/hospital/' +id

    $('#deleteModal').modal('show')

    


  }


</script>
    
@endsection