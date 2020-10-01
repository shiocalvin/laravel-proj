@extends('layouts.center')
 
 
@section('content')

<div class="card">
  @include('partials.success')


 
  <div class="card-header">
    <div class="row">

    <div class="col-sm-4 col-md-4">    
      <h1><b> Blood Drives</b></h1>
    </div>

    <div class="col-sm-6 col-md-6"></div>

    <div class="col-sm-2 col-md-2">
    <a href="{{route('drive.store',$center->centre_id)}}" class="btn text-white float-right" style="background-color: darkred">Create Blood drive</a>
    </div>

  </div>
  </div>
   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
       <tr style="color: white">
        
            
       
         <th>Drive_id</th>
         <th>Drive name</th>
         <th>Number of days</th>
         <th>Start date</th>
         <th>End date</th>
         <th></th>
         <th></th>
         <th></th>

         
         
       </tr>
       </thead>
       <tbody>
         {{-- @foreach ($drives as $drive)  --}}
         @foreach ($drives as $drive)
       <tr>

        
         
       <td>{{$drive->blood_drive_id}}</td>
       <td>{{$drive->blood_drive_name}}</td>
       <td>{{$drive->number_days}}</td>
       <td>{{$drive->start_date->diffForHumans()}}</td>
       <td>{{$drive->end_date->diffForHumans()}}</td>
       <td><a href="/center/{{$center->centre_id}}/blooddrive/{{$drive->blood_drive_id}}/edit" class="btn btn-secondary" >Edit</a></td>
       <td>


        {{Form::open([ 'method'=>'patch','action'=>['BloodDriveController@update',$drive->blood_drive_id]])}}
             

            {{Form::hidden('centre_id',$center->centre_id)}}
            {{Form::hidden('name',$drive->blood_drive_name)}}
            {{Form::hidden('days',$drive->number_days)}}
            {{Form::hidden('startDate',$drive->start_date)}}
            {{Form::hidden('endDate',$drive->end_date)}}
            {{Form::hidden('status','ended')}}

            
            {{Form::submit('End',['class'=>'btn btn-info'])}}


         {{Form::close()}}

       </td>

       <td><button class="btn text-white" style="background-color: darkred" onclick="handleDelete({{$drive->blood_drive_id}})">Cancel</button></td>
       

      
      
       </tr>
       @endforeach
       {{-- @endforeach --}}
       </tbody>
     </table>


     <form action="" method="POST" id="deleteCategoryform">

      @method('delete')
    
      @csrf
    
                <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: darkred">
            <h5 class="modal-title text-white"  id="deleteModalLabel">Cancel blood drive</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    
            <p class="text-center text-bold" >
             Are you sure you want to cancel the blood drive? 
            </p>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn text-white" style="background-color: darkred">Yes, Cancel</button>
          </div>
        </div>
      </div>
    </div>
    
    </form>












   </div>
   <!-- /.card-body -->
 </div>
 <!-- /.card -->
</div>

    
@endsection



@section('scripts')

<script>

  function handleDelete(id){

    var form = document.getElementById('deleteCategoryform')

    form.action= '/center/blooddrive/' +id

    $('#deleteModal').modal('show')

    


  }


</script>
    
@endsection

















