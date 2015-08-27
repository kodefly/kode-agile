@include('layouts.head')

<body class="hamburg">
<div id="page-wrapper" class="open">

  <!-- Sidebar -->
  @include('sidebar')
  <!-- End Sidebar -->

  <div id="content-wrapper">
    <div class="page-content">

      <!-- Header Bar -->

      <div class="row header">
        <div class="col-xs-12">
          <div class="user pull-right">

            <div class="dropdown item">
              <a href="#" class="dropdown-toggle" id="avatarDropdown" data-toggle="dropdown"
                ariahaspopup="true" aria-expand="true">
                <img src="img/avatar.jpg">
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="avatarDropdown">
                <li class="dropdown-header">Joe Bloggs</li>
                <li class="divider"></li>
                <li class="link"><a href="#">Profile</a></li>
                <li class="link"> <a href="#">Menu Item</a></li>

                <li class="divider"></li>
                <li class="link"><a href="#">Logout</a></li>
              </ul>
            </div>

            <div class="dropdown item">
              <a href="#" class="dropdown-toggle" id="notificationDropdown" data-toggle="dropdown"
                ariahaspopup="true" aria-expand="true">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                <li class="dropdown-header">
                Notifications
                </li>
                <li class="divider"></li>
                <li>
                <a href="#">Server Down!</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="meta">
            <div class="page">
              Dashboard
            </div>
            <div class="breadcrumb-links">
              Home / Dashboard
            </div>
          </div>
        </div>
      </div>

      <!-- End Header Bar -->

      <!-- Main Content -->
      @yield('content')
      <!-- End Page Content -->
    </div><!-- End Content Wrapper -->
  </div><!-- End Page Wrapper -->

  <script src="/js/all.js"></script>
</body>
</html>
