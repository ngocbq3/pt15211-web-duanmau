<?php

?>
<?php if (!check_account()) : ?>
    <div class="panel">
        <div class="heading">TÀI KHOẢN</div>
        <div class="form">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">
                        Tên đăng nhập
                    </label>
                    <input type="text" name="username" id="username" placeholder="username">
                    <span>
                        <?= isset($error['username']) ? $error['username'] : '' ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">
                        Mật khẩu
                    </label>
                    <input type="password" name="password" id="password" placeholder="password">
                    <span>
                        <?= isset($error['password']) ? $error['password'] : '' ?>
                    </span>
                </div>
                <button class="btn" name="btndangnhap">Đăng nhập</button>
            </form>
        </div>
    </div>
<?php else : ?>
    <div class="panel">
        <div class="heading">TÀI KHOẢN</div>
        <label for=""><?= $_SESSION['user']['username'] ?></label>
        <a href="<?= ROOT ?>?page=logout">Thoát</a>
    </div>
<?php endif; ?>