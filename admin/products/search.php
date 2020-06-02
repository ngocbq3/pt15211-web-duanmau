<?php
extract($_REQUEST);
$result = search_product($keyword);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" class="col-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall" id="checkall">
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>

                                </th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($result as $r) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $r['id_product'] ?>">
                                    </td>
                                    <td><?= $r['id_product'] ?></td>
                                    <td><?= $r['name_product'] ?></td>
                                    <td>
                                        <img src="../images/<?= $r['image_product'] ?>" width="120" alt="">
                                    </td>
                                    <td><?= ($r['status']) ? 'Có hàng' : 'Hết hàng' ?></td>
                                    <td><?= $r['price'] ?></td>
                                    <td>
                                        <a href="<?= ROOT ?>admin/?page=product&action=edit&id=<?= $c['id'] ?>" class="btn btn-success">Sửa</a>
                                        <a href="<?= ROOT ?>admin/?page=product&id=<?= $c['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" id="btndel-category" name="btn-del">Xóa mục đánh dấu</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->