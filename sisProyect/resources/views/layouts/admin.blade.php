<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ventas :3</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    

    <!-- Latest compiled and minified CSS -->
   <script type="text/javascript" src="{{asset('js/jQuery-2.1.4.min.js')}}" ></script>
     <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <!-- DataTable's -->
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}" ></script>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <!-- DataTable's -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- SweetAlert's -->
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <!-- SweetAlert's -->

    <script src="{{asset('js/fileinput.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/fileinput.min.css')}}">

    <script type="text/javascript" src="{{asset('js/fileinput_lang/es.js')}}"></script>


    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}" />
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>VT</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Ventas</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <p>

                      <small>url</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">Salir</a>
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
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">sdasd</li>

           @if(Auth::user()->tipo == 'admin')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{ url('almacen/articulo') }}"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a href=" {{ url('almacen/categoria') }}"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=" {{url('compras/ingresos')}} "><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href=" {{url('compras/proveedor')}}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=" "><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href=" "><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
            @endif
            <li class="treeview">
              <a href="#">
                <i class="fa fa-signal"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('reportes/ingresos')}} "><i class="fa fa-circle-o"></i> Ingresos </a></li>
                <li><a href="{{url('reportes/ventas')}}"><i class="fa fa-circle-o"></i> Ventas </a></li>

              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=" "><i class="fa fa-circle-o"></i> Usuarios </a></li>

              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">


		                          <!--Contenido-->
                             @yield('contenido')
		                          <!--Fin Contenido-->

                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
      </footer>
  <!-- Bootstrap 3.3.5 -->
     <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

    <script type="text/javascript" src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- jQuery 2.1.4 -->

    <!-- Bootstrap 3.3.5 -->

    <!-- AdminLTE App -->

    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/highcharts/highcharts.js')}}"></script>
    <script src="{{asset('js/highcharts/data.js')}}"></script>
    <script src="{{asset('js/highcharts/drilldown.js')}}"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">

               ;(function($){
                $.fn.datepicker.dates['es'] = {
                  days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                  daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                  daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                  months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                  monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                  today: "Hoy",
                  monthsTitle: "Meses",
                  clear: "Borrar",
                  weekStart: 1,
                  format: "yyyy-mm-dd"
                };
               }(jQuery));
               $('#fecha').datepicker({

                 language:'es',
                 calendarWeeks: true,
                 firstDay: 1,
                 todayHighlight:true,
                 "setDate": new Date("2016-02-02"),
                 "autoclose": true

               });
    </script>
      @yield('scripts')
  </body>

</html>
