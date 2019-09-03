<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'USC') }}</title>

     <!-- Temas -->
     <meta charset="utf-8" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <!--Multiselect-->
        <link href="../assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
        <!--Agregar elementos -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
     <style>

            .footer {
                position: absolute;
                bottom: 300;
                width: 100%;
                height: 120px;
                line-height:15px;
                background-color: #1E2B3C;
            }

            html {
                position: relative;
                min-height: 100%;
            } 

            body { margin-bottom:60px; } 
     </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    <div id="app">
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                 <div class="page-logo">
                    <a href="/home">
                         <h1>{{ config('app.name', 'USC') }}</h1> 
                    </a>
                </div>

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

                <div class="page-actions">
                
                </div>

                <div class="page-top">
               
                    <div class="top-menu">
                        
                    <ul class="nav navbar-nav pull-right">
                      
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif

                            @else
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="../assets/layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile">  {{ Auth::user()->name }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">

                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="icon-key"></i>Cerrar sesion</a>

                                    <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>-->
                                    </li>
                                    
                                </ul>
                            </li>
                              @endguest
                        </ul>
                                      
                    
                    </div>
                  </div>
               </div>
           </div>


        <main class="py-4" >
        
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                 <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <span class="title">AGENDA MEDIATICA</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Prensa</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="/prensa-internacional" class="nav-link ">
                                        
                                        <span class="title">Internacional</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/prensa-regional" class="nav-link ">
                                       
                                        <span class="title">Regional</span>
                                        
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/prensa-nacional" class="nav-link ">
                                        
                                        <span class="title">Nacional</span>
                                        
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-screen-desktop"></i>
                                <span class="title">Televisión </span>
                            
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/Televisión -regional" class="nav-link ">
                                       <span class="title">Regional</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/Televisión -nacional" class="nav-link ">
                                        <span class="title">Nacional</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span class="title">Reportes</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                            <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Prensa</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="/reporte-prensa-inter/1" class="nav-link " > Internacional </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="/reporte-prensa-nac/2" class="nav-link " > Nacional </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="/reporte-prensa-reg/3" class="nav-link " > Regional </a>
                                        </li>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Televisión </span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="/reporte-tv-nac/2" class="nav-link " > Nacional </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="/reporte-tv-reg/3" class="nav-link " > Regional </a>
                                        </li>

                                    </ul>
                                </li>


                            </ul>
                        
                        
                        
                        </li>

                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <span class="title">SEGUIMIENTO ELECTORAL</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-screen-desktop"></i>
                                <span class="title">Televisión </span>
                            
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/se-tv-nacional/1" class="nav-link ">
                                       <span class="title">Nacional</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/se-tv-regional/2" class="nav-link ">
                                        <span class="title">Regional</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-check"></i>
                                <span class="title">Medio Digital</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="/se-md-nacional/3" class="nav-link ">
                                       <span class="title">Nacional</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="/se-md-regional/4" class="nav-link ">
                                        <span class="title">Regional</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="/rpt-se-tv-nacional/1" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span class="title">Reportes</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <!--<ul class="sub-menu">
                            <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Televisión </span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item start ">
                                            <a href="/rpt-se-tv-nacional/1" class="nav-link ">
                                            <span class="title">Nacional</span>
                                            </a>
                                        </li>
                                        <li class="nav-item start ">
                                            <a href="/rpt-se-tv-regional/2" class="nav-link ">
                                                <span class="title">Regional</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Medios Digitales</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item start ">
                                            <a href="/rpt-se-md-nacional/3" class="nav-link ">
                                            <span class="title">Nacional</span>
                                            </a>
                                        </li>
                                        <li class="nav-item start ">
                                            <a href="/rpt-se-md-regional/4" class="nav-link ">
                                                <span class="title">Regional</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>-->
                        
                        
                        
                        </li>


                    </ul>

                </div>

            </div>
            <div class="page-content-wrapper" >
                
                @yield('content')
            </div >
        </div>
        </main>

        <footer class="footer" >
            <div class="row">
                <div class="col-md-12" style="margin-top:20px">
                    <div class="footer-copyright text-center py-3" ><label style="color:white" for="">Relizadores:Grupo GISOHA y COMBA +ID</label></div>
                    <div class="footer-copyright text-center py-3" ><label style="color:white" for="">Coordina:Pedro Pablo Aguilera</label></div>
                    <div class="footer-copyright text-center py-3" ><label style="color:white" for="">Acompañamiento:Ing. Diana Carolina Rivera Velasco </label></div>
                    <div class="footer-copyright text-center py-3" ><label style="color:white" for="">Desarrollador : Johan Poveda Argoti</label></div>
                </div>
            </div>     
       
        </footer>
    </div>

        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="../assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="../assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <script src="../js/highcharts.js"></script>
            <script src="../js/modules/data.js"></script>
            <script src="../js/modules/exporting.js"></script>
            <script src="../js/modules/export-data.js"></script>

                 <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

                        <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>

            <script src="../assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
            <script src="../assets/pages/scripts/components-bootstrap-multiselect.min.js" type="text/javascript"></script>
          
            <script src="../assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
            <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
           
            <script src="../assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
            <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

            <script src="../assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
      
            @yield('scripts')
</body>
</html>
