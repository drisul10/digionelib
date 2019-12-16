<?php

use app\back\digilib\Controller_Digilib;
use app\back\bookcategory\Controller_Book_Category;
use app\back\anggota\Controller_Anggota;
use config\Url;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
    require_once base_path() . '/' . $class_name . '.php';
});

if (!empty($_GET['c'])) {
    $c = $_GET['c'];
} else {
    $c = '';
}

if (!empty($_GET['r'])) {
    $r = $_GET['r'];
} else {
    $r = '';
}

switch ($c) {
    case 'back_digilib':
        $controller = new Controller_Digilib();

        case_back_digilib($controller, $r);
        break;

    case 'back_book_category':
        $controller = new Controller_Book_Category();

        case_back_book_category($controller, $r);
        break;

    case 'back_anggota':
        $controller = new Controller_Anggota();

        case_back_anggota($controller, $r);
        break;
}

function case_back_digilib($controller, $route)
{
    switch ($route) {
        case 'index':
            $controller->index();
            break;

        case 'create':
            $controller->create();
            break;

        case 'create_action':
            $controller->create_action();
            break;

        case 'detail':
            $controller->detail();
            break;

        case 'update':
            $controller->update();
            break;

        case 'update_action':
            $controller->update_action();
            break;

        case 'delete':
            $controller->delete();
            break;

        case 'delete_action':
            $controller->delete_action();
            break;

        case Url::RNAME_READ_PDF:
            $controller->read_pdf();
            break;

        default:
            $controller->not_found();
            break;
    }
}

function case_back_book_category($controller, $route)
{
    switch ($route) {
        case 'index':
            $controller->index();
            break;

        case 'create':
            $controller->create();
            break;

        case 'create_action':
            $controller->create_action();
            break;

        case 'detail':
            $controller->detail();
            break;

        case 'update':
            $controller->update();
            break;

        case 'update_action':
            $controller->update_action();
            break;

        case 'delete':
            $controller->delete();
            break;

        case 'delete_action':
            $controller->delete_action();
            break;

        default:
            $controller->not_found();
            break;
    }
}

function case_back_anggota($controller, $route)
{
    switch ($route) {
        case 'index':
            $controller->index();
            break;

        case 'create':
            $controller->create();
            break;

        case 'create_action':
            $controller->create_action();
            break;

        case 'detail':
            $controller->detail();
            break;

        case 'update':
            $controller->update();
            break;

        case 'update_action':
            $controller->update_action();
            break;

        case 'delete':
            $controller->delete();
            break;

        case 'delete_action':
            $controller->delete_action();
            break;

        default:
            $controller->not_found();
            break;
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
