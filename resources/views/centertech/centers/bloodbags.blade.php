@extends('layouts.centertech')


@section('content')
    
<div class="card">
  @include('partials.success')
  @include('partials.errors')


 
  <div class="card-header">
    <div class="row">

      <div class="col-sm-6 col-md-6">    
        <h1><b>Center Blood bags </b></h1>
      </div>

      <div class="col-sm-4 col-md-4"></div>

      <div class="col-sm-2 col-md-2">
      
      </div>

    </div>
  

     
 {{-- <form action="/center/centerlab/transferblood/send" method="post" class="form-inline">
    @csrf

    
        <div class="form-group">
            <label for="hospitals">Send to:</label>
            <select name="hospitals" id="" class="form-control">
                @foreach ($hospitals as $hospital)
             <option value="{{$hospital->hospital_id}}">{{$hospital->hospital_name}}</option>
                @endforeach
            </select>
        </div> --}}

 {{-- {{Form::model($bloodbagstested,['method'=>'post','action'=>'DonorsController@sendingbags'])}} --}}
 


  {{-- <div class="form-group">
    <label for="hospitals">Send to:</label>
    <select name="hospital" id="" class="form-control">
        @foreach ($hospitals as $hospital)
     <option value="{{$hospital->hospital_id}}">{{$hospital->hospital_name}}</option>
        @endforeach
    </select>
  </div> --}}

  

       
    

 


</div>
 


   <!-- /.card-header -->
   <div class="card-body">
     <table id="example1" class="table table-bordered table-striped">
       <thead style="background-color: darkred">
          <tr style="color: white">
            {{-- <th><input type="checkbox" id="options"></th> --}}
            <th>Days left for expiration</th>
            {{-- <th>Bag id</th> --}}
            <th>Blood Type</th>
            <th>Bag_id</th>
            <th></th>
            <th></th>
            
            
            
          </tr>
       </thead>
       <tbody>
           @foreach ($bloodbagstested as $bloodbag)  
          
       <tr>  
        {{-- <td> <input class="checkBoxes" type="checkbox" name="bags[]" value="{{$bloodbag->blood_bag_id}}"> </td> --}}
        <td>{{$bloodbag->expires_in}}</td> 
        {{-- <td>{{$bloodbag->blood_bag_id}}</td> --}}
        <td>{{$bloodbag->blood_type}}</td>
        <td>
          {{Form::open(['method'=>'post','action'=>'DonorsController@sendingbags'])}}
          {{Form::text('blood_bag_id',$bloodbag->blood_bag_id,['class'=>'form-control','readonly'])}}
        
        </td>
       
       
       

         
          <td>   
          {{Form::hidden('bag_id',$bloodbag->blood_bag_id)}}
          {{Form::hidden('center_id',$bloodbag->centre_id)}}
          {{Form::hidden('blood_type',$bloodbag->blood_type)}}
          {{Form::hidden('taken_at',$bloodbag->taken_at)}}
          {{Form::hidden('test_id',$bloodbag->test_id)}}
          {{Form::hidden('expires_in',$bloodbag->expires_in)}}
         


          <div class="form-group">
            <label for="hospitals">Send to:</label>
            <select name="hospital" id="" class="form-control">
                @foreach ($hospitals as $hospital)
             <option value="{{$hospital->hospital_id}}">{{$hospital->hospital_name}}</option>
                @endforeach
            </select>
          </div>
        </td>
        <td>


          {{Form::submit('SEND',['class'=>'btn btn-info'])}}

          {{Form::close()}}

        </td>
       
        
       
          
      </tr>
      @endforeach

     

     </tbody>
     
     
   </table>

  

{{-- </form> --}}

   


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
