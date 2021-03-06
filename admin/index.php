<?php
ob_start();
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : '';
require_once '../config/config.php';
require_once '../libs/categories.php';
require_once '../libs/product.php';
include_once 'template/header.php';
check_role();
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
            case 'edit':
                include_once 'categories/edit.php';
                break;
        }
        break;
    case 'product':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'products/index.php';
                break;
            case 'search':
                include_once 'products/search.php';
                break;
            case 'edit':
                include_once 'products/edit.php';
                break;
        }
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('location:' . ROOT . 'admin/login.php');
        die;
        break;
    default:
        echo "404 Not found";
        break;
}

include_once 'template/footer.php';

if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
}
?>
<script>
    $(document).ready(function() {
        $('#checkall').change(function() {
            $('input:checkbox').prop('checked', $(this).prop('checked'));
        })
        $('#btndel-category').click(function() {
            if ($('input:checked').length === 0) {
                alert("Bạn cần chọn ít nhất một danh mục");
                return false;
            }
        })
        $('.status').change(function() {
            if ($(this).prop('checked')) {
                $('#span').html('Còn hàng')
            } else {
                $('#span').html('Hết hàng')
            }
        })
    })
</script>
<?php
ob_end_flush();
