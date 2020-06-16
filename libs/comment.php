<?php
require_once 'database.php';

//Hiển thị danh sách comment theo product_id
function list_comment_product($product_id)
{
    $sql = "SELECT c.id comment_id, product_id, content, username, c.created_at created_comment 
            FROM comments c INNER JOIN users u ON c.user_id=u.id
            WHERE product_id='$product_id'";
    return query($sql);
}

//Thêm 1 comment vào bảng
function insert_comment($product_id, $user_id, $content)
{
    $date = date('Y-m-d');
    $data = [
        'product_id' => $product_id,
        'user_id'   => $user_id,
        'content'   => $content,
        'created_at' => $date
    ];
    insert('comments', $data);
}
