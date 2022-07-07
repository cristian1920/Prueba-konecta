<?php
include("../sesion.php");


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Desarrollado para konecta">
    <meta name="author" content="cristian camilo londoño meneses">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/imagenes/KONECTA.JPG">
    <title>Prueba</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/plugins/wizard/steps.css" rel="stylesheet">
    <!-- Footable CSS -->
    <link href="../../assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="../../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- page css -->
    <link href="../../assets/css/pages/footable-page.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <!-- wysihtml5 CSS -->
    <link rel="stylesheet" href="../../assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <!-- Dropzone css -->
    <link href="../../assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- page css -->
    <link href="../../assets/css/pages/card-page.css" rel="stylesheet">
    <link href="../../assets/css/pages/form-icheck.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../../assets/plugins/Sweetalert_propio/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- You can change the theme colors from here -->
    <link href="../../assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- full calendar -->
    <link href='../../node_modules/fullcalendar/main.css' rel='stylesheet' />
    <script src='../../node_modules/fullcalendar/main.js'></script>
    <script src='../../assets/js/es.js'></script>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando, Por favor espere...</p>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Principal/principal.php?validar=1">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/imagenes/KONECTA.JPG" alt="homepage" class="dark-logo" style="height: 63px;" />
                            <!-- Light Logo icon -->
                            <img src="../../assets/imagenes/LETRASK.JPG" alt="homepage" class="light-logo" style="height: 63px;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="../../assets/imagenes/LETRASK.JPG" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../../assets/imagenes/LETRASK.JPG" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down"></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/img/usuario.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated FadeIn">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4><?php echo $NombreUsuario; ?></h4>
                                                <p class="text-muted"><?php echo utf8_encode($Usuario) ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <!-- <li><a href="#"><i class="ti-email"></i> Inbox</a></li> -->
                                    <li><a href="../Login/cerrar.php"><i class="fa fa-power-off"></i> Cerrar Sesion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><span class="hide-menu"><?php echo $NombreUsuario ?> </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../Login/cerrar.php">Cerrar sesion</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">Inicio</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-home-outline"></i><span class="hide-menu">Inicio</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../Principal/principal.php?validar=1">Inicio</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">Inventario</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Inventario</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../productos/Productos.php">Productos</a></li>
                            </ul>
                        </li>

                        <li class="nav-small-cap">Ventas</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Ventas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../Venta/Venta.php">Vender Producto</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php
                if (isset($_GET['validar'])) { ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div id='calendar'></div>

                            </div>
                        </div>
                    </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {

                        // put your options and callbacks here
                        events: '../../Clases/calendar/class.calendar.php'
                         

                    });
                    calendar.render(

                        // will normally be on the right. if RTL, will be on the left
                    );
                });
            </script>
        <?php
                    include('./footer.php');
                }
        ?>