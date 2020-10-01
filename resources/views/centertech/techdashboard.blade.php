@extends('layouts.centertech')

@section('content')

<div class="container">

<div class="row">

    <div class="col-lg-4 col-sm-4 col-md-4">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: darkred">
          <div class="inner">
           <h3>{{$bloodbags}}</h3>

            <p>blood bags</p>
          </div>
          <div class="icon">
            <i class="ion ion-"></i>
          </div>
         <a href="" class="small-box-footer"> <i class="fas fa-"></i></a>
        </div>
    </div>

    

    <div class="col-lg-4 col-md-4 col-sm-4">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
           <h3>{{$hospitals}}</h3>

            <p>Hospitals</p>
          </div>
          <div class="icon">
            <i class="ion ion"></i>
          </div>
          <a href="#" class="small-box-footer"> <i class="fas fa-"></i></a>
        </div>
    </div>


    <div class="col-lg-4 col-sm-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
           <h3>{{$donors}}</h3>
            
            <p>Donors registered in the center</p>
          </div>
          <div class="icon">
            <i class="ion ion-"></i>
          </div>
          <a href="#" class="small-box-footer"> <i class="fas fa-"></i></a>
        </div>
      </div>


</div>
 {{-- end row 1 --}}


 <div class="row">
   

  <div class="col-lg-4 col-sm-4 col-md-4">
    <!-- small box -->
    <div class="small-box text-white" style="background-color: saddlebrown">
      <div class="inner">
       <h3>{{$techs}}</h3>

        <p>Center's laboratory technicians</p>
      </div>
      <div class="icon">
        <i class="ion ion-"></i>
      </div>
     <a href="" class="small-box-footer"> <i class="fas fa-"></i></a>
    </div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4">
  <!-- small box -->
  <div class="small-box text-white" style="background-color: tomato">
    <div class="inner">
     <h3>{{$centeruntested}}</h3>

      <p>Center untested blood bags</p>
    </div>
    <div class="icon">
      <i class="ion ion-"></i>
    </div>
   <a href="" class="small-box-footer"> <i class="fas fa-"></i></a>
  </div>
</div>


































 </div>

</div>

@endsection