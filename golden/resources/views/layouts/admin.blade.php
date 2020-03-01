<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('pageTitle') - {{ $setting->sitename }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('asset/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <style type="text/css">
      .portfolio-item {
        position: relative;
        background: #FFF;
            background-clip: border-box;
        margin-bottom: 10px;
        border: 8px solid #FFF;
        -webkit-border-radius: 5px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 5px;
        -moz-background-clip: padding;
        border-radius: 5px;
        background-clip: padding-box;
        -webkit-box-shadow: inset 0 1px #fff,0 0 8px #c8cfe6;
        -moz-box-shadow: inset 0 1px #fff,0 0 8px #c8cfe6;
        box-shadow: inset 0 1px #fff,0 0 8px #c8cfe6;
        color: inset 0 1px #fff,0 0 8px #c8cfe6;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -o-transition: all .5s ease;
        -ms-transition: all .5s ease;
        transition: all .5s ease;
      }
      
      .portfolio-item .portfolio-image {
        overflow: hidden;
        text-align: center;
        position: relative;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li><!--
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="color: #f0c332;font-size: 17px;font-weight: bolder;">Support</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="color: #f0c332;font-size: 17px;font-weight: bolder;">Documentation</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="color: #f0c332;font-size: 17px;font-weight: bolder;">FAQ</a>
          </li>-->
        </ul>


        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/shoppingcart') }}">
                <i class="fa fa-shopping-cart" style="color: green"></i>
                <span class="badge badge-danger navbar-badge">
                  {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                </span>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-user"></i>
              <span style="color: #f0c332;font-size: 17px;font-weight: bolder;">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <!--<a href="#" class="dropdown-item">
            <a href="{{ url('/profile') }}/?id={{ Auth::user()->id}}" class="dropdown-item">
                <i class="fa fa-users"></i> User Profile
              </a>-->

              <div class="dropdown-divider"></div>
              <a href="{{ url('/#') }}" class="dropdown-item">
                <i class="fa fa-key"></i><span> Change Password</span>
              </a>

              @if(Auth::user()->role!="Attendant")
              <div class="dropdown-divider"></div>
              <a href="{{ url('/setting') }}" class="dropdown-item">
                <i class="fas fa-chart-pie"></i><span> Site Setting</span>
              </a>
              @endif
              
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                  <i class="fas fa-lock"></i>
                  <span>Logout</span>        
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
              </form>
            </div>
          </li>
        </ul>
      </nav>
      @include('component.sidebar') 
      @yield('content')
      <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }}. Powered By <a href="http://zallasoft.com.ng">Zallasoft IT</a>.</strong>
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('asset/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
    <script src="{{ asset('asset/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
       
        <script>
          $(document).ready(function() {
              $('.js-example-basic-single').select2();
          });

          $(document).ready(function() {
              $('#example2').DataTable( {

                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, 100, -1 ],
                    [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
                ],
      
                  
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
                  ],

                  'paging'      : true,
                  'lengthChange': true,
                  'searching'   : true,
                  'ordering'    : true,
                  'info'        : true,
                  'autoWidth'   : false,
              } );
          } );
        </script>
  </body>
</html>
