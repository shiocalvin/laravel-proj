<aside class="main-sidebar sidebar-dark-red elevation-4" style="background-color: darkred">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     <img src="https://pbs.twimg.com/profile_images/3143520679/1751ea4ba1be8bf975f84119f041d1b3.jpeg" alt="NBTS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .9">

      <span class="brand-text font-weight-light" style="text-align:center">NBTS TANZANIA</span>
      
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src={{ asset("dist/img/user2-160x160.jpg") }} class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
        <h5> <a href="#" class="d-block" ><strong>{{$zone->zone_name}} ZONE</strong></a></h5>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
               <a href="{{route('zone.indexy',$zone->id)}}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
                </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Centers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('center.active',$zone->id)}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Active Centers</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('center.inactive',$zone->id)}}" class="nav-link">
                  <i class="nav-icon fas fa-ban"></i>
                  <p>In-active Centers</p>
                </a>
              </li>
            </ul>
          </li>

         

         

          {{-- <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="nav-icon fas fa-user-edit"></i>
                <p>
                Edit your information
                </p>
            </a>
            </li> --}}

         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>