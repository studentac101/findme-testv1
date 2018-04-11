<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <!-- <audio controls autoplay hidden>
    <source src="{{asset('assets/hayaan.mp3')}}" type="audio/mpeg">
  </audio> -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Find | Me</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/DataTables/datatables.min.css')}}"/>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-black.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-purple.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-yellow.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-red.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/skin-green.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/officers')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>ME</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Find</b>ME</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/uploads/avatars/{{Auth::guard('officer')->user()->avatar}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->

              <span class="hidden-xs">{{Auth::guard('officer')->user()->first_name}} {{Auth::guard('officer')->user()->last_name}} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/uploads/avatars/{{Auth::guard('officer')->user()->avatar}}" class="img-circle" alt="User Image">

                <p>
                  <small>Member since {{Auth::guard('officer')->user()->created_at}}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('officers/editprofile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('/doLogout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>

              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/uploads/avatars/{{Auth::guard('officer')->user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('officer')->user()->first_name}} {{Auth::guard('officer')->user()->last_name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{url('/officers')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class=""><a href="{{url('sightings/all')}}"><i class="fa fa-eye"></i> <span>Show all Sightings</span></a></li>
        <li class=""><a href="{{url('/officers')}}"><i class="fa fa-eye"></i> <span>Show all Incidents</span></a></li>
        @if(Auth::guard('officer')->user()->officer_type==0)
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Officer Options</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('officers/showallOfficers')}}">Show all Officers</a></li>
            <li><a href="{{url('officers/createOfficer')}}">Register an Officer</a></li>
          </ul>
        </li>
        @endif


        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Petitioner Options</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('petitioners/showallPetitioners')}}">Show all Petitioners</a></li>
            <li><a href="{{url('petitioners/createPetitioner')}}">Create Petitioner</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Find Me
        <small>A web and mobile based communication system for missing persons in selected barangays in Cebu City</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script type="text/javascript" src="{{asset('assets/bower_components/DataTables/datatables.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

<!-- googlejs -->
<script src="{{asset('js/googlemap.js')}}"></script>
<!-- Google Maps Api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvt6fum8rSGYtIb76xAfu0YSmuCykHDaA&libraries=places&callback=initAutocomplete&callback=initMap"
    async defer></script>

<!-- page script -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->



</body>


<script>
$(document).ready(function() {
  $('#Table').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
  });
});

</script>

</html>
