<?php
use config\Url;

// get controller name to request
$c = (!empty($_GET['c']) ? $_GET['c'] : '');

// get route name to request
$r = (!empty($_GET['r']) ? $_GET['r'] : '');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Digital One Library</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php if (isset($_GET['b4'])) : ?>
    <!-- Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <?php endif; ?>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=Url::BASE?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=Url::BASE?>/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="<?=Url::BASE?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=Url::BASE?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?=Url::BASE?>/bower_components/sweetalert/sweetalert2.min.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=Url::BASE?>" class="logo" style="position:fixed">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>DL</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>DIGONELIB</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar" style="position:fixed">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Administrator</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview <?= ($c === Url::CNAME_BACK_DIGILIB ? "active" : "") ?>">
                        <a href="#">
                            <i class="fa fa-book"></i> <span>Data Buku</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=""><a href="#"><i class="fa fa-circle-o"></i>Pustaka</a></li>
                            <li class="<?= ($c === Url::CNAME_BACK_DIGILIB ? "active" : "") ?>"><a
                                    href="<?=Url::BACK_DIGILIB_INDEX;?>"><i class="fa fa-circle-o"></i>Digital
                                    Library</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-exchange"></i> <span>Transaksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="#"><i class="fa fa-circle-o"></i>Peminjaman</a>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-circle-o"></i>Pengembalian</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($c === Url::CNAME_BACK_ANGGOTA ? "active" : "") ?>">
                        <a href="<?=Url::BACK_ANGGOTA_INDEX;?>">
                            <i class="fa fa-users"></i> <span>Anggota</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="treeview <?= (($c === Url::CNAME_BACK_LAPORAN_PEMINJAMAN ) || ($c === Url::CNAME_BACK_LAPORAN_PENGEMBALIAN) ? "active" : "") ?>">
                        <a href="#">
                            <i class="fa fa-exchange"></i> <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?= ($c === Url::CNAME_BACK_LAPORAN_PEMINJAMAN ? "active" : "") ?>">
                                <a href="<?=Url::BACK_LAPORAN_PEMINJAMAN_INDEX;?>"><i class="fa fa-circle-o"></i>Peminjaman</a>
                            </li>
                            <li class="<?= ($c === Url::CNAME_BACK_LAPORAN_PENGEMBALIAN ? "active" : "") ?>">
                                <a href="<?=Url::BACK_LAPORAN_PENGEMBALIAN_INDEX;?>"><i class="fa fa-circle-o"></i>Pengembalian</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">