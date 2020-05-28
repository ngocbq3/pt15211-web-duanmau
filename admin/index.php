<?php
ob_start();
$page = isset($_GET['page']) ? $_GET['page'] : '';
require_once '../config/config.php';
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
            case 'edit':
                include_once 'categories/edit.php';
                break;
        }
        break;
    default:
        echo "404 Not found";
        break;
}

include_once 'template/footer.php';
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
    })
</script>
<?php
ob_end_flush();
