<?php
require_once "libs/database.php";
$result = listAll('categories');
echo "<pre>";
var_dump($result);

$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case '':
    case 'home':
        include_once "site/home.php";
        break;
    case 'category':
        include_once "site/category.php";
        break;
    case 'product':
        include_once "site/product.php";
        break;
    default:
        include_once "site/404.php";
        break;
}
