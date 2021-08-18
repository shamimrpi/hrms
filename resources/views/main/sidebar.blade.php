  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    @php
      $prefix = Request::route()->getPrefix();
      $route = Route::current()->getName();
    @endphp
    <!-- Brand Logo -->
    <a href="#" class="brand-link" class="text-center">
      
      <span class="brand-text font-weight-light">HRMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty($user->image))?url('public/employeeImage/'.Auth::user()->image):''}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name ?? ''}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('/')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          
          </li>
          <li class="nav-item {{($prefix == 'Setup/')?'menu-open':''}}" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setup Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{($route == 'users.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('religion.index')}}" class="nav-link {{($route == 'religion.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Religion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('gender.index')}}" class="nav-link {{($route == 'gender.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gender</p>
                </a>
              </li>

              
              
            </ul>
          </li>
            <li class="nav-item {{($prefix == '/Admin')?'menu-open':''}}" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Employee Management 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{route('promotion')}}" class="nav-link {{($route == 'promotion')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Promotion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('increment')}}" class="nav-link {{($route == 'increment')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Increment</p>
                </a>
              </li>
            
              
            </ul>
          </li>
          
            <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i style="color:red" class="nav-icon fas fa-sign-out-alt"></i>
              <p >
                Logout
              
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>