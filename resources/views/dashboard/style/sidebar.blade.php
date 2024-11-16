      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html sidebar=========== -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                  <span class="menu-title">users</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>
@if (Auth::guard("admin")->user()->can('view.product'))

<li class="nav-item">
  <a class="nav-link" href="{{ route('product.index') }}">
    <span class="menu-title">products</span>
    <i class="mdi mdi-home menu-icon"></i>
  </a>
</li>
@endif


          </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
