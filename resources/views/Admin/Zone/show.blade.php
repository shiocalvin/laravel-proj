@extends('layouts.overall')

@section('content')

<div class="container">

  <div class="card">
  
    @include('partials.success')
      
 
   
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4 col-md-4">
              <h1>{{$zone->zone_name}}</h1>
            </div>

              <div class="col-sm-2 col-md-2"></div>

              <div class="col-sm-3 col-md-3"></div> 

                <div class="col-sm-3 col-md-3">
                <a href="{{route('zonedirector.create',['id'=>$zone->id])}}" class="btn float-right text-white " style="background-color: darkred" >Create Zone director</a>
                </div>

                   
        </div>
     </div>
     <!-- /.card-header -->


     <div class="container">
     <div class="row">



     
        <div class="col-lg-4 col-sm-4 col-md-4">
          <!-- small box -->
          <div class="small-box text-white" style="background-color: darkred">
            <div class="inner">
            <h3>{{$bloodbags}}</h3>

  
              <p>Blood bags</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
           <a href="" class="small-box-footer"> <i class="fas fa"></i></a>
          </div>

        </div>
      {{-- </div> --}}


      {{-- <div class="container"> --}}
        <div class="col-lg-4 col-sm-4 col-md-4">
          <!-- small box -->
          <div class="small-box text-white" style="background-color: darkred">
            <div class="inner">
             <h3>{{$centers}}</h3>
  
              <p>Centers</p>
            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
           <a href="" class="small-box-footer"> <i class="fas fa"></i></a>
          </div>

        </div>
      {{-- </div> --}}

      
       





      



      <div class="col-lg-4 col-sm-4 col-md-4">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: darkred">
          <div class="inner">
           <h3>{{$hospitals}}</h3>

            <p>Hospitals</p>
          </div>
          <div class="icon">
            <i class="ion ion-plus"></i>
          </div>
         <a href="" class="small-box-footer"> <i class="fas fa"></i></a>
        </div>

      </div>
    {{-- </div> --}}

    
     





    </div>










     </div>
     {{-- end row 1 --}}
    
     <div class="row">
        <div class="col sm-4 col-md-4">
            <div class="card-body">
               
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: darkred" class="text-white">
                <tr>
                  <th>Regions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($regions as $region) 
                <tr>
                <td><h5><strong>{{$region->name}}</strong></h5></td>
                @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          
       

        
    
    
      <div class="col-sm-8 col-md-8">
       
          <div class="card-body">
           
            <table id="example2" class="table table-bordered table-striped">
              <thead class="text-white" style="background-color: darkred">
              <tr>
                <th>Employee_id</th>
                <th>Zone Director's Name</th>
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
               
            
               @foreach ($zonedirectors as $zonedirector)
                   
               
               <tr>
               <td><h5><strong>{{$zonedirector->employee_id}}</strong></h5></td>
               <td><h5><strong>{{$zonedirector->first_name}} {{$zonedirector->last_name}}</strong></h5></td>
               <td> <a href="/admin/zone/director/{{$zonedirector->employee_id}}/directoredit" class="btn btn-secondary "  >Edit</a></td>
              <td> <button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$zonedirector->employee_id}})">Delete</button></td>
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
        <h5 class="modal-title text-white"  id="deleteModalLabel">Delete Zonal Director</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p class="text-center text-bold" >
         Are you sure you want to delete this director? 
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

</div>
 
 
 


    
@endsection

@section('scripts')

<script>

  function handleDelete(id){

    var form = document.getElementById('deleteCategoryform')

    form.action= '/admin/zone/' +id

    $('#deleteModal').modal('show')

    


  }


</script>
    
@endsection