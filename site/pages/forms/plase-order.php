<?php
include "../../../header.php";
?>
<head>
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
    <header id="header" class="main-header">

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
    <div class="content-wrapper row">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modern Pos System
                <small>Add Item</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../starter.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content col-md-6">
            <div >
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->

                <div >
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Available Item</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Click To Manage Item Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="tblItem" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Item Id</th>
                                            <th>Item Name</th>
                                            <th>quantity</th>
                                            <th>Unit Price</th>
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

        <!-- Main content -->
        <section class="content col-md-6">
            <div >
                <!-- left column -->
                <!--/.col (left) -->
                <!-- right column -->

                <div >
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Item</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="itemForm" action="../../../controller/item-controller.php" method="post" enctype="application/x-www-form-urlencoded" class="needs-validation">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Item Id</label>
                                    <input type="text" id="itemId" name="itemId" class="form-control" placeholder="Item Id" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" id="itemName" name="itemName" class="form-control" placeholder="Enter Name" disabled>
                                </div>
                                <div class="form-group ">

                                    <div>
                                        <div class="form-group col-md-4">
                                            <label>Available Quantity</label>
                                            <input type="text" id="quantity" name="availableQuantity" class="form-control" placeholder="Available quantity" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Unit Price</label>
                                            <input type="text" id="unitPrice" name="unitPrice" class="form-control" placeholder="Enter Unit Price" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Required Quantity</label>
                                            <input type="text" id="requiredQuantity" name="requiredQuantity" class="form-control" placeholder="Enter quantity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div >
                                        <button id="btnAdd" type="button"  class="btn btn-primary">Add</button>
                                        <button id="btnDelete" type="reset"  class="btn btn-danger">Delete</button>
                                        <button type="reset"  class="btn btn-danger">Clear</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <!-- /.row -->
        </section>
        <!-- /.content -->


        <!-- /.content -->

    <section id="sec" class="content col-md-12">
        <div >
            <!-- left column -->
            <!--/.col (left) -->
            <!-- right column -->

            <div >
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">My Cart</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Click To Manage Item Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="form-group col-md-1">
                                <label>Order Id</label>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" id="orderId" name="orderId" class="form-control" placeholder="Order Id " required>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Total</label>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" value="0.0" id="total" name="total" class="form-control" placeholder="Total" readonly>
                            </div>
                            <div class="box-body">
                                <table id="tblCart" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Item Id</th>
                                        <th>Item Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
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
                <div class="form-group form-row">
                    <div >
                        <button id="btnplaceOrder" type="button"  class="btn btn-primary">Place Order</button>
                    </div>
                </div>
                <!-- /.row -->
    </section>

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
    <script src="js/item-controller.js"></script>
    <script src="js/place-order-controller.js"></script>

    <style>

        #tblItem tbody tr:hover{

            background-color: rgba(2,2,3,0.34);

        }




    </style>

</body>
</html>
