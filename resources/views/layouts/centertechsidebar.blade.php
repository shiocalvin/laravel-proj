<aside class="main-sidebar sidebar-dark-red elevation-4" style="background-color: darkred">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://pbs.twimg.com/profile_images/3143520679/1751ea4ba1be8bf975f84119f041d1b3.jpeg" alt="NBTS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-light" >NBTS TANZANIA</span>
      
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src={{ asset("dist/img/user2-160x160.jpg") }} class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
        <h5> <a href="#" class="d-block">{{$center->name}}</a></h5>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item">
        <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
        </a>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-hand-holding-medical"></i>
            <p>
              Donors
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>Donors Registration</p>
              </a>
            </li>
            
            
          </ul>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-hand-holding-medical"></i>
            <p>
              Blood donation
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/donate" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p> Donors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/nondonor" class="nav-link">
                <i class="nav-icon fas fa-user-slash"></i>
                <p>Non-donors</p>
              </a>
            </li>
            
          </ul>
        </li>



        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-vial"></i>
            <p>
              Blood Testing
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/testing" class="nav-link ">
                <i class="nav-icon fas fa-clinic-medical"></i>
                <p> Centers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/donor/hospital/testing" class="nav-link">
                <i class="nav-icon fas fa-hospital-alt"></i>
                <p>Hospitals</p>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item">
          <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/transferblood" class="nav-link ">
              <i class="nav-icon fas fa-shuttle-van"></i>
              <p>
              Blood bags transfer
              </p>
          </a>
          </li>

          <li class="nav-item">
            <a href="/center/{{$center->centre_id}}/centerlab/{{$centertech->employee_id}}/receivedrequest" class="nav-link ">
                <i class="nav-icon fas fa-handshake"></i>
            
                <p>
                Requests received
                </p>
                <span class="right badge badge-info">{{$requests}}</span>
            </a>
            </li>
{{--   
            <li class="nav-item">
              <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-praying-hands"></i>
                  <p>
                  Requests for blood bags
                  </p>
              </a>
              </li> --}}
    


       
{{-- 
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Memo
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>Write Memo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="nav-icon fas fa-eye"></i>
                    <p>View Previous memos</p>
                  </a>
                </li>
              </ul>
            </li>
  
     --}}
    


          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>