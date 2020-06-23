<?php
if (isset($btnComment)) {
    insert_comment($id, $_SESSION['user']['id'], $content);
    header("location:" . $_SERVER['REQUEST_URI']);
    die;
}
update_view_product($id)
?>
<div class="content">
    <h3><?= $product['name'] ?></h3>
    <img src="<?= ROOT ?>images/<?= $product['image'] ?>" alt="">
    <h3>Giá: <?= $product['price'] ?></h3>
    <div class="detail">
        <?= $product['detail'] ?>
    </div>
    <h2>Bình luận sản phẩm</h2>
    <?php if (check_account()) : ?>
        <div class="form-comment">
            <form action="" method="POST">
                <textarea name="content" id="" cols="100" rows="5"></textarea>
                <button name="btnComment" class="btn">Gửi</button>
            </form>
        </div>
    <?php else : ?>
        <p>
            <b>Bạn cần đăng nhập mới có thể bình luận</b>
        </p>
    <?php endif; ?>
    <div class="comment">
        <ul>
            <?php
            $comments = list_comment_product($id);
            ?>
            <?php foreach ($comments as $c) : ?>
                <li>
                    <?= $c['content'] ?> |
                    <?= $c['username'] ?> |
                    <?= $c['created_comment'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>