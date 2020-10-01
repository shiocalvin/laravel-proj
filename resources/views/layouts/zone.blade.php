<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NBTS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href={{ asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{ asset("plugins/jqvmap/jqvmap.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("dist/css/adminlte.min.css") }}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset("plugins/daterangepicker/daterangepicker.css") }}>
  <!-- summernote -->
  <link rel="stylesheet" href={{ asset("plugins/summernote/summernote-bs4.css") }}>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href={{ asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}>
  <link rel="stylesheet" href={{ asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}>
 
  <!--Select 2 css CDN -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts.header')

  <!-- Main Sidebar Container -->
@include('layouts.zonesidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container" style="margin-top: 5px">
    @yield('content')
    </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<footer class="main-footer">
  @include('layouts.footer')
 </footer>


<!-- jQuery -->
<script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("plugins/jquery-ui/jquery-ui.min.js") }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

{{-- jquery ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- DataTables -->
<script src={{ asset("plugins/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
<script src={{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}></script>

<script>
  $(function () {

    $.fn.dataTable.ext.classes.sPageButton = 'button primary_button'; // Change Pagination Button Class

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      
      "responsive": true,
      "autoWidth": false,
    });
  });


  $(document).ready(function() {
    $('.regions-selector').select2({
      theme: "classic"
    });

  
  });



</script>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
 <script src="../../Chart.js-master/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 




@yield('scripts')

<!-- select 2 js CDN -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>




<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- ChartJS -->
<script src={{ asset("plugins/chart.js/Chart.min.js") }}></script>
<!-- Sparkline -->
<script src={{ asset("plugins/sparklines/sparkline.js") }}></script>
<!-- JQVMap -->
<script src={{ asset("plugins/jqvmap/jquery.vmap.min.js") }}></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src={{ asset("plugins/jquery-knob/jquery.knob.min.js") }}></script>
<!-- daterangepicker -->
<script src={{ asset("plugins/moment/moment.min.js") }}></script>
<script src={{ asset("plugins/daterangepicker/daterangepicker.js") }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
<!-- Summernote -->
<script src={{ asset("plugins/summernote/summernote-bs4.min.js") }}></script>
<!-- overlayScrollbars -->
<script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("dist/js/adminlte.js") }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("dist/js/pages/dashboard.js") }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("dist/js/demo.js") }}></script>
</body>
</html>
