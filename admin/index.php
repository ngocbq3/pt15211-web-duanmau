<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
include_once 'template/header.php';

switch ($page) {
    case '':
    case 'home':
        include_once 'home/home.php';
        break;
    case 'category':
        //Lấy hành động trong categories
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                //Thêm vào giao diện hiển thị categories
                include_once 'categories/index.php';
                break;
            case 'add':
                include_once 'categories/create.php';
                break;
        }
        break;
    default:
        echo "404 Not found";
        break;
}

include_once 'template/footer.php';
