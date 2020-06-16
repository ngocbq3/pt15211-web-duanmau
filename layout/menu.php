<nav>
    <ul>
        <li>
            <a href="<?= ROOT ?>">Home</a>
        </li>
        <?php foreach ($categories as $cate) : ?>
            <li>
                <a href="<?= ROOT ?>?page=category&id=<?= $cate['id'] ?>"><?= $cate['name'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>