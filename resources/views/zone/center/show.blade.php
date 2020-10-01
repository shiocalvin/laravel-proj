@extends('layouts.zone')

@section('content')

<div class="container">

  <div class="card">
  
    @include('partials.success')
      
 
   
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4 col-md-4">
              <h1>{{$center->name}}</h1>
            </div>

              <div class="col-sm-2 col-md-2"></div>

              <div class="col-sm-3 col-md-3"></div> 

                <div class="col-sm-3 col-md-3">
                <a href="/zone/{{$zone->id}}/center/{{$center->centre_id}}/director/create" class="btn float-right text-white " style="background-color: darkred" >Create Center director</a>
                </div>

                   
            </div>
     </div>
     <!-- /.card-header -->

     <div class="row">
    
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
                <td><h5><strong>{{$region->name}}</strong></h5></td>
                <td><h5><strong>{{$district->name}}</strong></h5></td>
                <td><h5><strong>{{$ward->name}}</strong></h5></td>
                
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>



          <div class="col-sm-4 col-md-4">




            <div class="container">
              <div class="col-lg-12 col-sm-12 col-md-12">
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

           </div>



          <div class="container">
            <div class="col-lg-12 col-sm-12 col-md-12">
              <!-- small box -->
              <div class="s/mall-box text-white" style="background-color: darkred">
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

          </div>



        </div>    

     </div>  

  {{-- end row 1 --}}
    
    
      {{-- <div class="col-sm-8 col-md-8">
        <div class="row">
          <div class="col-sm-8 col-md-8"></div>
          <div class="col-sm-4 col-md-4"> 
           
          </div>
        </div>  

     </div>    --}}

        <hr>

        {{-- start row 2 --}}

        <div class="row">


          <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="card-body">
           
              <table id="example2" class="table table-bordered table-striped">
                <thead class="text-white" style="background-color: darkred">
                <tr>
                  <th>Employee id</th>
                  <th>Center Director's name</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                
              
                @foreach ($centerdirectors as $centerdirector)
                    
                
                <tr>
                <td><h5><strong>{{$centerdirector->employee_id}}</strong></h5></td>
                <td><h5><strong>{{$centerdirector->first_name}} {{$centerdirector->last_name}}</strong></h5></td>
                <td> <a href="/zone/{{$zone->id}}/center/{{$center->centre_id}}/director/{{$centerdirector->employee_id}}/edit" class="btn btn-secondary ">Edit</a></td>
                <td> <button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$centerdirector->employee_id}})">Delete</button></td>
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
                      <h5 class="modal-title text-white"  id="deleteModalLabel">Delete Center Director</h5>
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

        {{-- </div> --}}
           {{-- col-lg-8 --}}

  



  </div>
{{-- end row 2 --}}
 </div>
 
 
 


    
@endsection

@section('scripts')

<script>

  function handleDelete(id){

    var form = document.getElementById('deleteCategoryform')

    form.action= '/zone/center/director/' +id

    $('#deleteModal').modal('show')

    


  }


</script>


<script>


var ctx = document.getElementById('groupChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['A+','A-','B+','B-','AB+','AB-','O+','O-','RH-null'],
        datasets: [{
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#81000','#3b8bba','#c1c7d1','dark-red'],
            data: [{1,2,3,4,5,5,6,5,5]
        }]
    },

    // Configuration options go here
    options: {}
});




</script>
    
@endsection