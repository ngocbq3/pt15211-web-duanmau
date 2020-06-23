<?php
$product_new = list_limit_product(3);
$product_sale = list_sale_product();
?>
<div class="content">
    <div class="heading headline">Sản phẩm mới nhất</div>
    <div class="row">
        <?php foreach ($product_new as $pro_new) : ?>
            <div class="col">
                <a href="<?= ROOT ?>?page=product&id=<?= $pro_new['id'] ?>">
                    <img src="images/<?= $pro_new['image'] ?>" alt="">
                    <div class="product-name">
                        <h4><?= $pro_new['name'] ?></h4>
                    </div>
                    <div class="price">
                        <?= $pro_new['price'] ?> <u>đ</u>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="heading headline">Sản phẩm đang được giảm giá</div>
    <div class="row">
        <?php foreach ($product_sale as $pro_sale) : ?>
            <div class="col">
                <a href="<?= ROOT ?>?page=product&id=<?= $pro_new['id'] ?>">
                    <img src="images/<?= $pro_sale['image'] ?>" alt="">
                    <div class="product-name">
                        <h4><?= $pro_sale['name'] ?></h4>
                    </div>
                    <div class="price">
                        <?= $pro_sale['price'] ?> <u>đ</u>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>