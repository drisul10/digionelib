<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digital One Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $base_url ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= $base_url ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= $base_url ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= $base_url ?>bower_components/sweetalert/sweetalert2.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="shortcut icon" href="<?= $base_url ?>logo.ico" type="image/x-icon">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= $base_url ?>" class="navbar-brand"><b>DIGIONELIB</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">

              <li class="dropdown <?php if (isset($_GET['page'])) {
                                    if ($_GET['page'] == 'pustaka_buku' || $_GET['page'] == 'digital_library') {
                                      echo 'active';
                                    }
                                  } ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buku <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?=$base_url. '?page=pustaka_buku'?>">Pustaka Buku</a></li>
                  <li><a href="<?=$base_url. '?page=digital_library'?>">Digital Library</a></li>
                </ul>
              </li>
              <li class=" <?php if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'peminjaman') {
                              echo 'active';
                            }
                          } ?>"><a href="<?=$base_url.'?page=peminjaman'?>">Peminjaman</a></li>
              <li class=" <?php if (isset($_GET['page'])) {
                            if ($_GET['page'] == 'pengembalian') {
                              echo 'active';
                            }
                          } ?>"><a href="<?=$base_url.'?page=pengembalian'?>">Pengembalian</a></li>
            </ul>
            <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?= $base_url ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">

                    <?php
                    if (isset($_SESSION['username'])) {
                      echo ucwords($_SESSION['username']);
                    } else {
                      echo "Alexander Pierce";
                    }
                    ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?= $base_url ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                      <?php
                      if (isset($_SESSION['username'])) {
                        echo ucwords($_SESSION['username']);
                      } else {
                        echo "Alexander Pierce";
                      }
                      ?>
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
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
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php
            if (isset($_GET['page'])) {
              echo  ucwords(str_replace('_', ' ', $_GET['page']));
            } else {
              echo "Beranda";
            }
            ?>
            <!-- <small>Example 2.0</small> -->
          </h1>
          <ol class="breadcrumb">
            <?php
            if (isset($_GET['page'])) {
              echo '<li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>';
              echo ' <li class="active">' . ucwords(str_replace('_', '', $_GET['page'])) . '</li>';
            } else {
              echo '<li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>';
            }
            ?>

          </ol>
        </section>

        <!-- Main content -->
        <section class="content">