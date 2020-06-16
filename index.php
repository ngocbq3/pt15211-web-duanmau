<?php
session_start();
require_once "libs/categories.php";
require_once "libs/product.php";
require_once 'config/config.php';
require_once 'libs/user.php';
require_once 'libs/comment.php';
//Nếu đã đăng nhập rồi thì check_session
extract($_REQUEST);
if (isset($btndangnhap)) {
    if (check_user($username)) {
        //Trong trường hợp username tồn tại thì lấy ra dữ liệu
        $user = check_user($username);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header('location:' . ROOT);
        } else {
            $error['password'] = "Mật khẩu không đúng!";
        }
    } else {
        $error['username'] = "Username không đúng";
    }
}
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
        $product = list_one_product($id);
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
