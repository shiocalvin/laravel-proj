@extends('layouts.zone')

@section('content')

<div class="container">

<div class="row">

    <div class="col-lg-4 col-sm-4 col-md-4">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: darkred">
          <div class="inner">
           <h3>{{$bloodbags}}</h3>
           {{-- <h3>{{$Ap}}</h3>
           <h3>{{$donors}}</h3> --}}

            <p>Blood bags</p>
          </div>
          <div class="icon">
            <i class="ion ion-"></i>
          </div>
         <a href="" class="small-box-footer"> <i class="fas fa-arrow-"></i></a>
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
          <a href="#" class="small-box-footer"> <i class="fas fa-arrow-"></i></a>
        </div>
    </div>


    <div class="col-lg-4 col-sm-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
           <h3>{{$centers}}</h3>
            
            <p>Centers</p>
          </div>
          <div class="icon">
            <i class="ion ion-"></i>
          </div>
          <a href="#" class="small-box-footer"><i class="fas fa-arrow-"></i></a>
        </div>
      </div>


</div>
{{-- end row --}}

<div class="row">



  <div class="col-lg-4 col-sm-4 col-md-4">
    <!-- small box -->
    <div class="small-box text-white" style="background-color: indigo">
      <div class="inner">
       <h3>{{$donors}}</h3>
        
        <p>Total donors registered</p>
      </div>
      <div class="icon">
        <i class="ion ion-"></i>
      </div>
      <a href="#" class="small-box-footer"> <i class="fas fa-arrow-"></i></a>
    </div>
  </div>


  <div class="col-lg-4 col-sm-4 col-md-4">
    <!-- small box -->
    <div class="small-box text-white" style="background-color: indigo">
      <div class="inner">
       <h3>{{$zonedirectors}}</h3>
        
        <p>Zone directors</p>
      </div>
      <div class="icon">
        <i class="ion ion-"></i>
      </div>
      <a href="#" class="small-box-footer"> <i class="fas fa-arrow-"></i></a>
    </div>
  </div>

  

</div>
{{-- end row 2 --}}




<div class="row">

  <div class="col-sm-6 col-md-6 col-lg-6">

<!-- PIE CHART -->
<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title">Donors Gender</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
     
    </div>
  </div>
  <div class="card-body">
    <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

  </div>



  <div class="col-sm-6 col-md-6 col-lg-6">

    <!-- PIE CHART -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Blood groups available</h3>
    
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
         
        </div>
      </div>
      <div class="card-body">
        <canvas id="groupChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    
      </div>





 </div>
 {{-- end row 3 --}}

 <div class="row">

  <div class="col-sm-2 col-md-2 col-md-2"></div>


  <div class="col-sm-8 col-md-8 col-lg-8">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Blood Collection</h3>
  
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
       
      </div>
    </div>
    <div class="card-body">
      <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  
    </div>

  </div>

  <div class="col-sm-2 col-md-2 col-md-2"></div>














 </div>





</div>

@endsection



@section('scripts')


<script>

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            backgroundColor : ['#f56954', '#00a65a'],
            data: [{{$male}}, {{$female}}]
        }]
    },

    // Configuration options go here
    options: {}
});


var ctx = document.getElementById('groupChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['A+','A-','B+','B-','AB+','AB-','O+','O-','RH-null'],
        datasets: [{
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#81000','#3b8bba','#c1c7d1','dark-red'],
            data: [{{$Ap}},{{$An}},{{$Bp}},{{$Bn}},{{$ABp}},{{$ABn}},{{$Op}},{{$On}},{{$RH}}]
        }]
    },

    // Configuration options go here
    options: {}
});



var ctx = document.getElementById('lineChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','Septermber','October','November','December'],
        datasets: [{
            label: 'Blood bags',
            backgroundColor: 'rgb(139,0,0)',
            borderColor: 'rgb(255, 99, 132)',
            data: [{{$jan}},{{$feb}},{{$march}},{{$april}},{{$may}},{{$june}},{{$july}},{{$aug}},{{$sept}},{{$oct}},{{$nov}},{{$dec}}]
        }]
    },

    // Configuration options go here
    options: {}
});









// $(function () {
//   /* ChartJS
//    * -------
//    * Here we will create a few charts using ChartJS
//    */

//   //--------------
//   //- AREA CHART -
//   //--------------

//   // Get context with jQuery - using jQuery's .get() method.
//   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

//   var areaChartData = {
//     labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//     datasets: [
//       {
//         label               : 'Digital Goods',
//         backgroundColor     : 'rgba(60,141,188,0.9)',
//         borderColor         : 'rgba(60,141,188,0.8)',
//         pointRadius          : false,
//         pointColor          : '#3b8bba',
//         pointStrokeColor    : 'rgba(60,141,188,1)',
//         pointHighlightFill  : '#fff',
//         pointHighlightStroke: 'rgba(60,141,188,1)',
//         data                : [28, 48, 40, 19, 86, 27, 90]
//       },
//       {
//         label               : 'Electronics',
//         backgroundColor     : 'rgba(210, 214, 222, 1)',
//         borderColor         : 'rgba(210, 214, 222, 1)',
//         pointRadius         : false,
//         pointColor          : 'rgba(210, 214, 222, 1)',
//         pointStrokeColor    : '#c1c7d1',
//         pointHighlightFill  : '#fff',
//         pointHighlightStroke: 'rgba(220,220,220,1)',
//         data                : [65, 59, 80, 81, 56, 55, 40]
//       },#fff
//     ]
//   }

//   var areaChartOptions = {
//     maintainAspectRatio : false,
//     responsive : true,
//     legend: {
//       display: false
//     },
//     scales: {
//       xAxes: [{
//         gridLines : {
//           display : false,
//         }
//       }],
//       yAxes: [{
//         gridLines : {
//           display : false,
//         }
//       }]
//     }
//   }

//   // This will get the first returned node in the jQuery collection.
//   var areaChart       = new Chart(areaChartCanvas, { 
//     type: 'line',
//     data: areaChartData, 
//     options: areaChartOptions
//   })

//   //-------------
//   //- LINE CHART -
//   //--------------
//   var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
//   var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
//   var lineChartData = jQuery.extend(true, {}, areaChartData)
//   lineChartData.datasets[0].fill = false;
//   lineChartData.datasets[1].fill = false;
//   lineChartOptions.datasetFill = false

//   var lineChart = new Chart(lineChartCanvas, { 
//     type: 'line',
//     data: lineChartData, 
//     options: lineChartOptions
//   })

//   //-------------
//   //- DONUT CHART -
//   //-------------
//   // Get context with jQuery - using jQuery's .get() method.
//   var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
//   var donutData        = {
//     labels: [
//         'Chrome', 
//         'IE',
//         'FireFox', 
//         'Safari', 
//         'Opera', 
//         'Navigator', 
//     ],
//     datasets: [
//       {
//         data: [700,500,400,600,300,100],
//         backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
//       }
//     ]
//   }
//   var donutOptions     = {
//     maintainAspectRatio : false,
//     responsive : true,
//   }
//   //Create pie or douhnut chart
//   // You can switch between pie and douhnut using the method below.
//   var donutChart = new Chart(donutChartCanvas, {
//     type: 'doughnut',
//     data: donutData,
//     options: donutOptions      
//   })

//   //-------------
//   //- PIE CHART -
//   //-------------
//   // Get context with jQuery - using jQuery's .get() method.
//   var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
//   var pieData        = donutData;
//   var pieOptions     = {
//     maintainAspectRatio : false,
//     responsive : true,
//   }
//   //Create pie or douhnut chart
//   // You can switch between pie and douhnut using the method below.
//   var pieChart = new Chart(pieChartCanvas, {
//     type: 'pie',
//     data: pieData,
//     options: pieOptions      
//   })

//   //-------------
//   //- BAR CHART -
//   //-------------
//   var barChartCanvas = $('#barChart').get(0).getContext('2d')
//   var barChartData = jQuery.extend(true, {}, areaChartData)
//   var temp0 = areaChartData.datasets[0]
//   var temp1 = areaChartData.datasets[1]
//   barChartData.datasets[0] = temp1
//   barChartData.datasets[1] = temp0

//   var barChartOptions = {
//     responsive              : true,
//     maintainAspectRatio     : false,
//     datasetFill             : false
//   }

//   var barChart = new Chart(barChartCanvas, {
//     type: 'bar', 
//     data: barChartData,
//     options: barChartOptions
//   })

//   //---------------------
//   //- STACKED BAR CHART -
//   //---------------------
//   var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
//   var stackedBarChartData = jQuery.extend(true, {}, barChartData)

//   var stackedBarChartOptions = {
//     responsive              : true,
//     maintainAspectRatio     : false,
//     scales: {
//       xAxes: [{
//         stacked: true,
//       }],
//       yAxes: [{
//         stacked: true
//       }]
//     }
//   }

//   var stackedBarChart = new Chart(stackedBarChartCanvas, {
//     type: 'bar', 
//     data: stackedBarChartData,
//     options: stackedBarChartOptions
//   })
// })


</script>






































    
@endsection