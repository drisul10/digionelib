<?php

// show error
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// auto require class without care of calling require
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
    require_once base_path() . '/' . $class_name . '.php';
});

// get controller name to request
$c = (!empty($_GET['c']) ? $_GET['c'] : '');

// get route name to request
$r = (!empty($_GET['r']) ? $_GET['r'] : '');

// to create instance
switch ($c) {
    case 'back_digilib':
        $controller = new app\back\digilib\Controller_Digilib();
        break;

    case 'back_book_category':
        $controller = new app\back\bookcategory\Controller_Book_Category();
        break;

    case 'back_anggota':
        $controller = new app\back\anggota\Controller_Anggota();
        break;

    case 'back_laporan_peminjaman':
        $controller = new app\back\laporan_peminjaman\Controller_Laporan_Peminjaman();
        break;

    case 'back_laporan_pengembalian':
        $controller = new app\back\laporan_pengembalian\Controller_Laporan_Pengembalian();
        break;

    case 'digilib':
        $controller = new app\front\digilib\Controller_Digilib();
        break;
}

// get all method of controller class
$list_method_of_class = get_class_methods($controller);

// fetch all method of controller class, then call function which is same to the route name
foreach ($list_method_of_class as $key => $value) {
    if ($r == $value) {
        $controller->{$value}();
        return;
    }
}

function base_path_global()
{
    return $_SERVER["DOCUMENT_ROOT"];
}

function base_path()
{
    return $_SERVER["DOCUMENT_ROOT"] . '/leosird';
}
