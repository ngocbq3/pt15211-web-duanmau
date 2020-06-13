<?php
session_start();
require_once "libs/categories.php";
require_once "libs/product.php";
require_once 'config/config.php';
$page = isset($_GET['page']) ? $_GET['page'] : '';
$categories = list_all_category();
switch ($page) {
    case '':
    case 'home':
        $view_page = "layout/home.php";
        break;
    case 'category':
        $view_page = "layout/category.php";
        break;
    case 'product':
        $view_page = "layout/product.php";
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('location:' . ROOT);
        die;
        break;
    default:
        $view_page = "site/404.php";
        break;
}

include_once "layout/layout.php";
