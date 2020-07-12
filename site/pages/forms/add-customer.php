<?php
include "../../../header.php";
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>General Form Elements</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="viewAll()" class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="../../starter.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">POS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Rubictron </b> php pos</span>
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


                    <!--           User Account Menu-->


                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="../../../user-images/<?=$_SESSION['image']?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?=$_SESSION['username']?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="../../../user-images/<?=$_SESSION['image']?>" class="img-circle" alt="User Image">

                                <p>
                                    <?=$_SESSION['username']?> : <?= $_SESSION['usertype']?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../../../controller/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../../user-images/<?=$_SESSION['image']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['username']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->


    <?php
    include "sidebar-menu.php"
    ?>


    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modern Pos System
        <small>Manage Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

      <?php

      if($_SESSION['usertype']==='admin'){

      ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <!--/.col (left) -->
        <!-- right column -->

        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="customerForm" action="../../../controller/customer-controller.php" method="post" enctype="application/x-www-form-urlencoded" class="needs-validation">
                <!-- text input -->
                  <div class="form-group">
                      <label>Customer Id</label>
                      <input type="text" id="customerId" name="customerId" class="form-control" placeholder="Customer Id" readonly>
                  </div>
                <div class="form-group">
                  <label>Customer Name</label>
                  <input type="text" id="customerName" name="customerName" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Contact No</label>
                  <input type="text" id="contactNo" name="contactNo" class="form-control" placeholder="Enter contact no" required>
                </div>
                <div class="form-group">
                    <div >
                        <button id="btnSave" type="submit"  class="btn btn-success">Save</button>
                        <button id="btnAllCustomer" type="button" class="btn btn-primary">View All Customer</button>
                        <button id="btnDeleteCustomer" type="reset"  class="btn btn-danger">Delete <i class="fa fa-user-times" aria-hidden="true"></i></button>
                        <button type="reset"  class="btn btn-danger">Cancel</button>
                    </div>
                </div>
              </form>

          <!-- /.box -->
        </div>
        <!--/.col (right) -->

      </div>


      <!-- /.row -->
    </section>
    <!-- /.content -->
      <?php } ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Customers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Click To Manage Customer Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="tblCustomer" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Contact No</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->

                    </div>
                    <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>





  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="js/customer-controller.js"></script>

<style>


    #tblItem tbody tr:hover{

        background-color: rgba(2,2,3,0.34);

    }



</style>

</body>
</html>
