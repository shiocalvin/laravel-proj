@extends('layouts.center')


@section('content')
    
<div class="card">
  @include('partials.success')


 
  <div class="card-header">
    <div class="row">

      <div class="col-sm-6 col-md-6">    
        <h1><b> Laboratory Technicians</b></h1>
      </div>

      <div class="col-sm-4 col-md-4"></div>

      <div class="col-sm-2 col-md-2">
      <a href="{{Route('centerlab.create',$center->centre_id)}}" class="btn text-white float-right" style="background-color: darkred">Create Lab technician</a>
      </div>

    </div>
  </div>
   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
          <tr style="color: white">
            <th>Employee_id</th>
            <th> Name</th>
            <th></th>
            <th></th>
            
            
          </tr>
       </thead>
       <tbody>
          @foreach ($centerlabs as $centerlab)  
       <tr>
         
       <td><h5><strong>{{$centerlab->employee_id}}</strong></h5></td>
       <td><h5><strong>{{$centerlab->first_name}} {{$centerlab->last_name}}</strong></h5></td>
       <td><a href="/center/{{$center->centre_id}}/centerlab/{{$centerlab->employee_id}}/edit" class="btn btn-secondary" >Edit</a></td>
       <td> <button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$centerlab->employee_id}})">Delete</button></td>
  
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
<h5 class="modal-title text-white"  id="deleteModalLabel">Delete Center Lab technician</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<p class="text-center text-bold" >
Are you sure you want to delete this Center lab technician? 
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

form.action= '/center/centerlab/' +id

$('#deleteModal').modal('show')


}


</script>

@endsection