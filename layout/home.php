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
        <div class="col">
            <a href="#">
                <img src="images/anh1.jfif" alt="">
                <div class="product-name">
                    <h4>Samsung Galaxy A50s - Chính hãng</h4>
                </div>
                <div class="price">
                    7000000 <u>đ</u>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#">
                <img src="images/iphone.jfif" alt="">
                <div class="product-name">
                    <h4>Iphone 11 Pro Max</h4>
                </div>
                <div class="price">
                    27000000 <u>đ</u>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#">
                <img src="images/anh1.jfif" alt="">
                <div class="product-name">
                    <h4>Apple iPad Mini 5 - Wifi - 64GB - Chính hãng</h4>
                </div>
                <div class="price">
                    7000000 <u>đ</u>
                </div>
            </a>
        </div>

    </div>
</div>