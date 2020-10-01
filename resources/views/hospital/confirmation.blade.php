@extends('layouts.hospital')


@section('content')
    
<div class="card">
  @include('partials.success')


 
  <div class="card-header">
    <div class="row">

      <div class="col-sm-6 col-md-6">    
        <h1><b>Center Blood bags </b></h1>
      </div>

      <div class="col-sm-4 col-md-4"></div>

      <div class="col-sm-2 col-md-2">
      
      </div>

    </div>
  

     
  {{-- <form action="" method="post" class="form-inline">
    @csrf
    @method('put')

    
        <div class="form-group">
            <label for="hospitals">Status:</label>
            <select name="hospitals" id="" class="form-control">
               
             <option value="received">RECEIVED</option>
               
            </select>
        </div>
    
 
        <div class="form-group">
            <input type="submit" value="CONFIRM" class="btn btn-primary float-right">
        </div> --}}

    

 


</div>
 


   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
          <tr style="color: white">
            {{-- <th><input type="checkbox" id="options"></th> --}}
            <th>Days left for expiration</th>
            <th>Bag id</th>
            <th>Blood Type</th>
            <th></th>
            
            
          </tr>
       </thead>
       <tbody>
           @foreach ($bloodbags as $bloodbag)   
       <tr>  
         @if ($bloodbag->transfer_stat =='in transit')
             
       
        {{-- <td> <input class="checkBoxes" type="checkbox" name="bags[]" value="{{$bloodbag->blood_bag_id}}"> </td> --}}
        <td>{{$bloodbag->expires_in}}</td> 
        <td>{{$bloodbag->blood_bag_id}}</td>
        <td>{{$bloodbag->blood_type}}</td>
        <td>

          {{Form::open(['method'=>'patch','action'=>['DonorsController@confirmationupdate',$bloodbag->blood_bag_id]])}}

          {{Form::hidden('transfer_stat','received')}}

          {{Form::submit('Confirm',['class'=>'btn btn-info'])}}

          {{Form::close()}}


        </td>
       
        @endif 
      </tr>
     
      @endforeach
     </tbody>
     
     
   </table>

</form>

   


  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

   
@endsection

{{-- @section('scripts')

<script>

        $(document).ready(function(){

        $('#options').click(function(){

            if (this.checked) {
                $('.checkBoxes').each(function(){
                    
                    this.checked=true;
                });
            }else {


                $('.checkBoxes').each(function(){
                    
                    this.checked=false;
                });

            }
            
        });

        });

</script>
    
@endsection


 --}}
