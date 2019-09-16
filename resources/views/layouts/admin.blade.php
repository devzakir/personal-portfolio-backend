<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('admin') }}/assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <!-- No Extra plugin used -->
  <link href="{{ asset('admin') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/assets/plugins/toastr/toastr.min.css" rel="stylesheet" />
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('admin') }}/assets/css/sleek.css" />
  <link id="sleek-css" rel="stylesheet" href="{{ asset('admin') }}/assets/css/zakir.css" />
  <!-- FAVICON -->
  <link href="{{ asset('admin') }}/assets/img/favicon.png" rel="shortcut icon" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @yeild('style')
  <script src="{{ asset('admin') }}/assets/plugins/nprogress/nprogress.js"></script>
</head>
<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  <script>NProgress.configure({ showSpinner: false }); NProgress.start(); </script>

  <div class="mobile-sticky-body-overlay"></div>  
  <div id="toaster"></div>
  <div class="wrapper">
    <!--
      ====================================
      ——— LEFT SIDEBAR WITH FOOTER
      =====================================
    -->
    <aside class="left-sidebar bg-sidebar">
      <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
          <a href="/index.html">
            {{-- <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33" >
              <g fill="none" fill-rule="evenodd">
                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
              </g>
            </svg> --}}
            <span class="brand-name">Admin Panel</span>
          </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
          <!-- sidebar menu -->
          <ul class="nav sidebar-inner" id="sidebar-menu">
              <li  class="has-sub active expand" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                  aria-expanded="false" aria-controls="dashboard">
                  <i class="mdi mdi-view-dashboard-outline"></i>
                  <span class="nav-text">Dashboard</span> <b class="caret"></b>
                </a>
                <ul  class="collapse show"  id="dashboard"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    <li  class="active" >
                      <a class="sidenav-item-link" href="index.html">
                        <span class="nav-text">Ecommerce</span>
                      </a>
                    </li>
                    <li >
                      <a class="sidenav-item-link" href="analytics.html">
                        <span class="nav-text">Analytics</span>
                        <span class="badge badge-success">new</span>
                      </a>
                    </li>
                  </div>
                </ul>
              </li>
            
              <li  class="has-sub" >
                <a class="sidenav-item-link" href="{{ route('user.index') }}">
                  <i class="mdi mdi-account-group"></i>
                  <span class="nav-text">Users</span>
                </a>
              </li>
          </ul>
        </div>
        <hr class="separator" />
        <div class="sidebar-footer">
          {{-- <div class="sidebar-footer-content">
            <h6 class="text-uppercase">
              Cpu Uses <span class="float-right">40%</span>
            </h6>
            <div class="progress progress-xs">
              <div
                class="progress-bar active"
                style="width: 40%;"
                role="progressbar"
              ></div>
            </div>
            <h6 class="text-uppercase">
              Memory Uses <span class="float-right">65%</span>
            </h6>
            <div class="progress progress-xs">
              <div
                class="progress-bar progress-bar-warning"
                style="width: 65%;"
                role="progressbar"
              ></div>
            </div>
          </div> --}}
          <div class="sidebar-footer-content text-center">
            <a href="#" class="btn btn-primary">View Website</a>
          </div>
        </div>
      </div>
    </aside>

    <div class="page-wrapper">
      <!-- Header -->
      <header class="main-header " id="header">
        <nav class="navbar navbar-static-top navbar-expand-lg">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <!-- search form -->
          <div class="search-form d-none d-lg-inline-block">
            <div class="input-group">
              <button type="button" name="search" id="search-btn" class="btn btn-flat">
                <i class="mdi mdi-magnify"></i>
              </button>
              <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
                autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
              <ul id="search-results"></ul>
            </div>
          </div>

          <div class="navbar-right ">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <button class="dropdown-toggle" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">You have 5 notifications</li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-plus"></i> New user registered
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-account-remove"></i> User deleted
                      <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                    </a>
                  </li>
                  <li class="dropdown-footer">
                    <a class="text-center" href="#"> View All </a>
                  </li>
                </ul>
              </li>
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  @if(Auth::user()->profile->avatar)
                      <img src="{{ asset(Auth::user()->profile->avatar) }}" alt="user image" class="img-fit img-fluid user-image">
                  @else
                      <img src="{{ asset('admin') }}/assets/img/user/u6.jpg" alt="user image" class="img-fit img-fluid user-image">
                  @endif
                  <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <!-- User image -->
                  <li class="dropdown-header">
                      @if(Auth::user()->profile->avatar)
                          <img src="{{ asset(Auth::user()->profile->avatar) }}" alt="user image" class="img-fit img-fluid img-circle">
                      @else
                          <img src="{{ asset('admin') }}/assets/img/user/u6.jpg" alt="user image" class="img-fit img-fluid img-circle">
                      @endif
                    <div class="d-inline-block">
                        {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
                    </div>
                  </li>
                  <li>
                    <a href="{{ route('profile') }}">
                      <i class="mdi mdi-account"></i> My Profile
                    </a>
                  </li>
                  <li>
                    <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                  </li>
                  <li class="dropdown-footer">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> Log Out </a>                    
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="content-wrapper">
        <div class="content">		
          @yield('content')
        </div>
      </div>
      <footer class="footer mt-auto">
        <div class="copyright bg-white">
          <p> &copy; <span id="copy-year">{{ date('Y') }}</span> Developed By <a class="text-primary" href="https://zakirhossen.com/" target="_blank" >Zakir Hossen</a>. </p>
        </div>
        <script>
            var d = new Date();
            var year = d.getFullYear();
            document.getElementById("copy-year").innerHTML = year;
        </script>
      </footer>
    </div>
  </div>

  {{--  Logout Form --}}
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>

  <script src="{{ asset('admin') }}/assets/plugins/jquery/jquery.min.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
  {{-- <script src="{{ asset('admin') }}/assets/plugins/jekyll-search.min.js"></script> --}}
  <script src="{{ asset('admin') }}/assets/plugins/charts/Chart.min.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/daterangepicker/moment.min.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="{{ asset('admin') }}/assets/plugins/toastr/toastr.min.js"></script>
  <script src="{{ asset('admin') }}/assets/js/sleek.bundle.js"></script>
  @yeild('script')
  <script>
    @if(Session::has('success'))
        toastr.success('{{Session::get('success')}}');
    @endif
    @if(Session::has('info'))
        toastr.info('{{Session::get('info')}}');
    @endif
    @if(Session::has('warning'))
        toastr.warning('{{Session::get('warning')}}');
    @endif
  </script>
</body>
</html>
