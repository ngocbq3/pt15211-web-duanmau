<?php
require_once "../libs/categories.php";
$cate = list_all_category();
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục <a href="<?= ROOT ?>admin/?page=category&action=add" class="btn btn-primary">Thêm mới</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall" id="checkall">
                            </th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall" id="checkall">
                            </th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($cate as $c) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id[]" id="" value="<?= $c['id'] ?>">
                                </td>
                                <td><?= $c['id'] ?></td>
                                <td><?= $c['name'] ?></td>
                                <td>
                                    <img src="../images/<?= $c['image'] ?>" width="120" alt="">
                                </td>
                                <td><?= $c['created_at'] ?></td>
                                <td>
                                    <a href="" class="btn btn-success">Sửa</a>
                                    <a href="" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->