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
        <title>Park King | Home</title>
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
            <a href="index2.html" class="logo">
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

                    <li class="treeview"><a href="add-parking-lot.php"><i class="fa fa-flag" aria-hidden="true"></i>
                            <span>Add Parking Lot</span></a></li>
                    <li class="treeview"><a href="pages/forms/reservations.php"><i class="fa fa-list-ul" aria-hidden="true"></i>
                            <span>Reservations</span></a>
                    </li>
                    <!--                    <li><a href="pages/forms/plase-order.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                    <!--                            Place Order</a></li>-->


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
                    <small>View Parking lot details</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Parking lot details</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
                  | Your Page Content Here |
                  -------------------------->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Parking Lot details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="../controller/reservation-controller.php" method="post" id="form">
                        <div class="box-body">
                        <div class="form-group">
                                <label for="lot_id">Lot ID</label>
                                <input type="text" class="form-control" id="lot_id" placeholder="Lot ID" >
                        
                            </div>
                            <div class="form-group">
                                <label for="lot_name">Lot Name</label>
                                <input type="text" class="form-control" id="lot_name" placeholder="Lot Name" >
                        
                            </div>
                            <div class="form-group">
                                <label for="lot_no">Street Number</label>
                                <input type="text" class="form-control" id="lot_no" placeholder="Street Number" >
                        
                            </div>
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" id="Street" placeholder="Street" >
                        
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" placeholder="City" >
                        
                            </div>
                            <div class="form-group">
                                <label for="slot_no">Occupied slots</label>
                                <input type="text" class="form-control" id="slot_no" placeholder="Number of Occupied Slots" >
                        
                            </div>
                            <div class="form-group">
                                <label for="slot_no">Free slots</label>
                                <input type="text" class="form-control" id="slot_no" placeholder="Number of Free Slots " >
                        
                            </div>
                          
                          
                            
                            

                        </div>
                        <!-- /.box-body -->

                        
                    </form>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h4 class= "box-title">Parking Lot Details</h4>
                    </div>
                    <div class="box-body">
                    <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 15px">Lot ID</th>
                                        <th style="width: 20px">Lot Name</th>
                                        <th style="width: 20px">Street no</th>
                                        <th style="width: 15px">Street</th>
                                        <th style="width: 15px">City</th>
                                        <th style="width: 15px">Occupied Slots</th>
                                        <th style="width: 15px">Free Slots</th>

                                    </tr>
                                   
                                </tbody>
                    </table>
                     </div>
                       

                    <div class="box-footer clearfix">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-info pull-right btn-danger" type="submit">Delete</button>
                    </div>
                    </div>
                    
                </div>
            </section>
            <!-- /.content -->
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
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="dist/js/reservation-controller.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
    </body>
    </html>

    <?php
}
?>