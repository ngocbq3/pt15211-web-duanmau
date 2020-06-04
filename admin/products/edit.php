<?php

//Làm việc với csdl
//Viết câu lệnh truy vấn đến bảng categories

$categories = list_all_category();

//Lấy id từ url để sửa sản phẩm
$id = $_GET['id'];
//Câu lệnh sql lấy ra sản phẩm

$product = list_one_product($id);
?>
<!--Trình soạn thảo văn bản cho phần nội dung của sản phẩm tinymce-->
<script src="https://cdn.tiny.cloud/1/ld34vclndumv7xny2s3pnsrpxwoe9floxn96fpbl57r085kv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cập nhật sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="products/edit-save.php" method="POST" enctype="multipart/form-data" class="col-md-12">
                <input type="hidden" name="id" value="<?= $product['id'] ?>" id="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--Load categories (danh mục sản phẩm)-->
                            <label for="cate_id">Chọn danh mục sản phẩm</label>
                            <select name="cate_id" id="cate_id" class="form-control">
                                <?php foreach ($categories as $cate) : ?>
                                    <?php if ($cate['id'] == $product['cate_id']) : ?>
                                        <option value="<?= $cate['id'] ?>" selected><?= $cate['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Tên sản phẩm" value="<?= $product['name'] ?>">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="status" class="form-check-input status" id="" <?= ($product['status'] == 1) ? 'checked' : '' ?> <label for="status" class="status-title">Trạng thái <span id="span"><?= ($product['status'] == 1) ? 'Có hàng' : 'Hết hàng' ?></span></label>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá sản phẩm</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Giá sản phẩm" value="<?= $product['price'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="sale">Giá giảm</label>
                            <input type="number" value="<?= $product['sale'] ?>" name="sale" id="sale" class="form-control" placeholder="Giảm giá">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Ảnh đại diện</label>
                            <input type="hidden" name="image" value="<?= $product['image'] ?>">
                            <input type="file" class="form-control-file border" id="image" name="image">
                            <img src="../images/<?= $product['image'] ?>" width="150" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $product['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="detail">Chi tiết sản phẩm</label>
                    <textarea class="form-control" id="detail" name="detail" rows="25"><?= $product['detail'] ?></textarea>
                </div>

                <button type="submit" name="btn-save-product" class="btn btn-success">Ghi lại</button>
            </form>
        </div>
    </div>
</div>
<script>
    //Thêm trình soạn thảo văn bản tinymce vào phần nội dung của sản phẩm
    tinymce.init({
        selector: '#detail'
    });
</script>