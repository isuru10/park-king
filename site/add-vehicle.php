<?php
session_start();

if(!isset($_SESSION['exists'])){
    header("Location:/park-king");

}
else {

    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Park King | Add Vehicle</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
        <link rel="stylesheet" href="dist/css/map.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="../index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PAR</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PARK</b> KING</span>
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


                        <!--           Tasks Menu-->
                        <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button -->

                        </li>
                        <!--           User Account Menu-->


                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../user-images/user.png?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= $_SESSION['username'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../user-images/user.png?>" class="img-circle"
                                         alt="User Image">

                                    <p>
                                        <?= $_SESSION['username'] ?> : <?= $_SESSION['usertype'] ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../controller/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                        <img src="../user-images/user.png" class="img-circle" alt="User Image">

                    </div>
                    <div class="pull-left info">
                        <p><?echo($_SESSION['username'])?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->

                <!-- /.search form -->

                <!-- Sidebar Menu ---------------------------------------------------------------------------------------------------------------------------->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <!-- Optionally, you can add icons to the links -->

                    <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>
                            <span>Home</span></a></li>
                    <?php
                    if($_SESSION["usertype"] != "driver"){
                        ?>
                        <li><a href="add-parking-lot.php"><i class="fa fa-flag" aria-hidden="false"></i>
                                <span>Add Parking Lot</span></a></li>
                        <?
                    }
                    ?>

                    <?php
                    if($_SESSION["usertype"] != "driver") {
                        ?>
                        <li><a href="reservations.php"><i class="fa fa-list-ul" aria-hidden="false"></i>
                                <span>Reservations</span></a>
                        </li>
                        <?
                    }
                    ?>

                    <?php
                    if($_SESSION["usertype"] != "owner"){
                        ?>
                        <li><a href="add-vehicle.php"><i class="fa fa-car" aria-hidden="false"></i>
                                <span>Add Vehicle</span></a>
                        </li>
                        <?
                    }
                    ?>

                    <?php
                    if($_SESSION["usertype"] != "driver"){
                        ?>
                        <li><a href="manage-parking-lots.php"><i class="fa fa-flag" aria-hidden="false"></i>
                                <span>Manage Parking Lots</span></a>
                        </li>
                        <?
                    }
                    ?>

                </ul>
                <!-- /.sidebar-menu -->>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Home
                    <small>Register your vehicle</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
                  | Your Page Content Here |
                  -------------------------->
                <div class="register-box-body">
                    <form action="../controller/vehicle-controller.php" method="post" id="form_data">
                        <div class ="row">
                            <div class = "col-md-3">
                                <div class="form-group ">
                                    <label>Select Model</label>
                                    <select class="form-control" id="model_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="new_brand_name">OR create a new model</label>
                                    <input type="text" class="form-control" placeholder="Brand Name" id="new_brand_name" name="new_brand_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="new_model_name"> </label>
                                    <input type="text" class="form-control" placeholder="Model Name" id="new_model_name" name="new_model_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="button" class="form-control btn-success" id="btnAddModel" value="Add Model">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Plate Number" name="plate_no">
                                </div>
                            </div>
                        </div>



                        <div class ="row">
                            <div class = "col-md-3">
                                <div class="form-group has-feedback">
                                <label for="colour">Select Colour</label>
                                <input type="color" class="form-control" placeholder="Color of the vehicle" name="colour" id="colour">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btnSave" class="btn btn-success btn-float-left">Save</button>

                    </form>
                </div>

            </section>
        </div>

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Park King V1.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2018 <a href="#">G10</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                    </ul>
                    <!-- /.control-sidebar-menu -->
                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyDiCwWs9bRobsQsUtL9GZCOaf-7pgj3l7o" async defer></script>
    <script src="dist/js/add-vehicle-controller.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
    </body>
    </html>

    <?php
}
?>


