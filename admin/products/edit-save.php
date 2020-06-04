<?php
session_start();
//Thêm kết nối database
require_once "../../libs/product.php";
require_once "../../config/config.php";
if (isset($_POST['btn-save-product'])) {
    extract($_REQUEST);
    //Gán thư mục lưu ảnh
    $dir = "../../images/";
    //Đặt biến kiểm tra xem người dùng có upload ảnh không
    $okUpload = false;
    if ($_FILES['image']['size'] > 0) {
        $okUpload = true;
        $image = $_FILES['image']['name'];
    } else {
        $image = isset($_POST['image']) ? $_POST['image'] : '';
    }
    $status = (isset($status)) ? true : false;
    $date = date('Y-m-d');

    if (update_product($cate_id, $name, $description, $image, $detail, $price, $sale, $status, $date, $id)) {
        if ($okUpload) {
            move_uploaded_file($_FILES['image']['tmp_name'], $dir . $image);
        }
        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header("location:" . ROOT . "admin/?page=product");
        die();
    }
}
