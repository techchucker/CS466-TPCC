<!DOCTYPE html>
<html lang="en">
<?php
  include("config.php");

  foreach (glob("models/*.php") as $filename)
  {
    include_once($filename);
  }

  session_start();
  /*
  echo 'Session ID: ';
  echo session_id(),'<br>';
  */
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CS466 TPC-C Benchmark</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script>
      $(function(){
        var $table = $('#dataTable');

        $table.bootstrapTable('hideColumn', 'LN4_OL_SUPPLY_W_ID');
      });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CS466 TPC-C <sup>CS466</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
                    <i class="fas fa-fw fa-solid fa-home"></i>
                    <span>Home</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item active">
                <a class="nav-link" type="button" onClick="window.location.href=window.location.href">
                    <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
                    <i class="fas fa-fw fa-solid fa-sync"></i>
                    <span>Reset</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container-fluid">
                  <form method="POST" action="index.php">

                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800">TPC-C Benchmark Order</h1>
                    </div>

                    <!-- Content Row -->
                    <?php
                    if(empty($_POST)){
                    ?>
                    <div class="row d-flex align-items-center justify-content-center">
                        <!-- Warehouse/District/Customer Card -->
                        <div class="col-xl-6 col-md-4 mb-2">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <!-- Warehouse/District/Customer Form -->
                                      <div class="card-body">
                                        <?php
                                        #$order1 = new Order();
                                        ?>

                                          <div class="table-responsive">
                                            <!--<form method="GET" action="">-->
                                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                  <tbody>
                                                      <tr>
                                                        <td class="font-weight-bold">Select Warehouse</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="warehouseID"/></td>
                                                      </tr>
                                                      <tr>
                                                        <td class="font-weight-bold">Select District</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="districtID"/></td>
                                                      </tr>
                                                      <tr>
                                                        <td class="font-weight-bold">Select Customer</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="customerID"/></td>
                                                      </tr>
                                                  </tbody>
                                              </table>

                                              <?php
                                              # Setting warehouse, district, and customer id for order
                                              /*
                                              $order1->warehouseID = 12;
                                              $order1->districtID = 24;
                                              $order1->customerID = 7;
                                              */
                                              ?>
                                            <!--</form>-->
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row d-flex align-items-center justify-content-center">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                              <!-- Item Order Form -->
                              <div class="card border-left-primary shadow h-100 py-2">
                                  <div class="card-header py-3">
                                      <h6 class="m-0 font-weight-bold text-primary">Order Form</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                          <!--<form method="GET" action="">-->
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Line</th>
                                                        <th>OL_I_ID</th>
                                                        <!--<th>OL_SUPPLY_W_ID</th>-->
                                                        <th>OL_QUANTITY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN1_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN1_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN1_OL_QUANTITY"/></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN2_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN2_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN2_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN3_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN3_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN3_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN4_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN4_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN4_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN5_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN5_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN5_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN6_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN6_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN6_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">7</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN7_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN7_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN7_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">8</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN8_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN8_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN8_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">9</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN9_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN9_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN9_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">10</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN10_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN10_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN10_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">11</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN11_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN11_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN11_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">12</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN12_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN12_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN12_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">13</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN13_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN13_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN13_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">14</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN14_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN14_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN14_OL_QUANTITY"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">15</td>
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN15_OL_I_ID"/></td>
                                                        <!--<td><input type="text" class="form-control bg-light border-0 small" name="LN15_OL_SUPPLY_W_ID"/></td>-->
                                                        <td><input type="text" class="form-control bg-light border-0 small" name="LN15_OL_QUANTITY"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                              <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm fas fa-sm text-white-80" type="reset" id="reset" />
                                              <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm fas fa-sm text-white-80" type="submit">
                                            </div>
                                          <!--</form>-->
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </form>
                    </div>
                    <?php
                    }
                    ?>


                    <?php
                    try {
                      if(!empty($_POST)){

                        if(isset($_POST['warehouseID']) && isset($_POST['districtID']) && isset($_POST['customerID'])) {
                          $wid = $_POST['warehouseID'];
                          $did = $_POST['districtID'];
                          $cid = $_POST['customerID'];
                          $showResults = true;
                          $timer = new Timer();
                          $timer->startTimer();
                          #echo 'Order Timer Started at: '. $timer->getStartTime();
                          # Create Order object
                          $order = new Order($wid, $did, $cid);

                          # Create Item objects
                          if(isset($_POST['LN1_OL_I_ID']) && isset($_POST['LN1_OL_QUANTITY'])){$item1 = new Item($_POST['LN1_OL_I_ID'], $_POST['LN1_OL_QUANTITY']);}
                          if(isset($_POST['LN2_OL_I_ID']) && isset($_POST['LN2_OL_QUANTITY'])){$item2 = new Item($_POST['LN2_OL_I_ID'], $_POST['LN2_OL_QUANTITY']);}
                          if(isset($_POST['LN3_OL_I_ID']) && isset($_POST['LN3_OL_QUANTITY'])){$item3 = new Item($_POST['LN3_OL_I_ID'], $_POST['LN3_OL_QUANTITY']);}
                          if(isset($_POST['LN4_OL_I_ID']) && isset($_POST['LN4_OL_QUANTITY'])){$item4 = new Item($_POST['LN4_OL_I_ID'], $_POST['LN4_OL_QUANTITY']);}
                          if(isset($_POST['LN5_OL_I_ID']) && isset($_POST['LN5_OL_QUANTITY'])){$item5 = new Item($_POST['LN5_OL_I_ID'], $_POST['LN5_OL_QUANTITY']);}
                          if(isset($_POST['LN6_OL_I_ID']) && isset($_POST['LN6_OL_QUANTITY'])){$item6 = new Item($_POST['LN6_OL_I_ID'], $_POST['LN6_OL_QUANTITY']);}
                          if(isset($_POST['LN7_OL_I_ID']) && isset($_POST['LN7_OL_QUANTITY'])){$item7 = new Item($_POST['LN7_OL_I_ID'], $_POST['LN7_OL_QUANTITY']);}
                          if(isset($_POST['LN8_OL_I_ID']) && isset($_POST['LN8_OL_QUANTITY'])){$item8 = new Item($_POST['LN8_OL_I_ID'], $_POST['LN8_OL_QUANTITY']);}
                          if(isset($_POST['LN9_OL_I_ID']) && isset($_POST['LN9_OL_QUANTITY'])){$item9 = new Item($_POST['LN9_OL_I_ID'], $_POST['LN9_OL_QUANTITY']);}
                          if(isset($_POST['LN10_OL_I_ID']) && isset($_POST['LN10_OL_QUANTITY'])){$item10 = new Item($_POST['LN10_OL_I_ID'], $_POST['LN10_OL_QUANTITY']);}
                          if(isset($_POST['LN11_OL_I_ID']) && isset($_POST['LN11_OL_QUANTITY'])){$item11 = new Item($_POST['LN11_OL_I_ID'], $_POST['LN11_OL_QUANTITY']);}
                          if(isset($_POST['LN12_OL_I_ID']) && isset($_POST['LN12_OL_QUANTITY'])){$item12 = new Item($_POST['LN12_OL_I_ID'], $_POST['LN12_OL_QUANTITY']);}
                          if(isset($_POST['LN13_OL_I_ID']) && isset($_POST['LN13_OL_QUANTITY'])){$item13 = new Item($_POST['LN13_OL_I_ID'], $_POST['LN13_OL_QUANTITY']);}
                          if(isset($_POST['LN14_OL_I_ID']) && isset($_POST['LN14_OL_QUANTITY'])){$item14 = new Item($_POST['LN14_OL_I_ID'], $_POST['LN14_OL_QUANTITY']);}
                          if(isset($_POST['LN15_OL_I_ID']) && isset($_POST['LN15_OL_QUANTITY'])){$item15 = new Item($_POST['LN15_OL_I_ID'], $_POST['LN15_OL_QUANTITY']);}

                          $order->addItem($item1);
                          $order->addItem($item2);
                          $order->addItem($item3);
                          $order->addItem($item4);
                          $order->addItem($item5);
                          $order->addItem($item6);
                          $order->addItem($item7);
                          $order->addItem($item8);
                          $order->addItem($item9);
                          $order->addItem($item10);
                          $order->addItem($item11);
                          $order->addItem($item12);
                          $order->addItem($item13);
                          $order->addItem($item14);
                          $order->addItem($item15);

                          # Executes placeOrder function to initiate the SQL Stored Procedure call
                          $order->placeOrder($pdo);

                          ?>
                          <div class="row d-flex align-items-center justify-content-center">

                              <!-- Area Chart -->
                              <div class="col-xl-4 col-md-4 mb-2">
                              <!--<div class="col-xl-8 col-lg-7">-->
                                  <div class="card shadow mb-4">
                                    <!-- Item Order Form -->
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                <!--<form method="GET" action="">-->
                                                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                          <td class="font-weight-bold">Warehouse</td>
                                                          <td><?php echo $order->warehouseID ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="font-weight-bold">District</td>
                                                          <td><?php echo $order->districtID ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="font-weight-bold">Customer</td>
                                                          <td><?php echo $order->customerID ?></td>
                                                        </tr>
                                                    </tbody>
                                                  </table>
                                                <!--</form>-->
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </form>
                          </div>

                          <div class="row d-flex align-items-center justify-content-center">
                              <!-- Area Chart -->
                              <div class="col-xl-8 col-lg-7">
                                  <div class="card shadow mb-4">
                                    <!-- Item Order Form -->
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Order Summary</h6>
                                        </div>
                                        <div class="card-body">
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                <!--<form method="GET" action="">-->
                                                  <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Line</th>
                                                            <th class="text-center">OL_I_ID</th>
                                                            <!--<th class="text-center">OL_SUPPLY_W_ID</th>-->
                                                            <th class="text-center">OL_QUANTITY</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                      <?php
                                                        $counter = 1;
                                                        foreach($order->items as $i)
                                                        {?>
                                                          <tr>
                                                              <td class="text-center"><?php echo $counter ?></td>
                                                              <td class="text-center"><?php echo $i->itemID ?></td>
                                                              <!--<td class="text-center"></td>-->
                                                              <td class="text-center"><?php echo $i->quantity ?></td>
                                                          </tr>
                                                        <?php
                                                          $counter++;
                                                        }?>
                                                    </tbody>

                                                  </table>
                                                  <div class="text-center">
                                                    <button onClick="window.location.href=window.location.href" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm fas fa-sm text-white-80">Reset</button>
                                                  </div>
                                                <!--</form>-->
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </form>
                          </div>


                            <?php
                            $timer->stopTimer();
                            #echo 'Timer stopped at: '. $timer->getEndTime(). '<br>';
                            #echo 'Total Transaction Duration: '. $timer->calculateDuration();

                          }
                          else
                          {

                          }
                        }
                        else
                        {

                        }

                      } catch (PDOException $e) {
                        die("Error occurred:" . $e->getMessage());
                      }
                      ?>

                  </div>
                  </div>
                </div>
            <!--  </div>-->
            </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Matt & Ryan 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
