<?php
require_once 'database.php';

//Tìm kiếm sản phẩm theo tên $name
function search_product($name)
{
    $sql = "SELECT 
    p.id as id_product, 
    p.name as name_product,
    c.name as name_category,  
    p.image as image_product, 
    status, 
    price,
    p.created_at as date_created  
    FROM products p INNER JOIN categories c ON p.cate_id=c.id 
    WHERE p.name LIKE '%$name%'";

    return query($sql);
}
//Hiển thị toàn bộ danh sách sản phẩm bao gồm cả tên danh mục (Category name)
function list_all_product()
{
    $sql = "SELECT 
    p.id as id_product, 
    p.name as name_product,
    c.name as name_category,  
    p.image as image_product, 
    status, 
    price,
    p.created_at as date_created  
    FROM products p INNER JOIN categories c ON p.cate_id=c.id 
    Order by id_product DESC";
    return query($sql);
}
//Hiển thị danh sách sản phẩm có hạn chế
function list_limit_product($count)
{
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 0,$count";
    return query($sql);
}

//Sản phẩm giảm giá
function list_sale_product()
{
    $arr = ['sale', '>', 0];
    return query_where('products', $arr);
}
//function lấy ra 1 sản phẩm
function list_one_product($id)
{
    return listOne('products', 'id', $id);
}
//function update_product
//$cate_id, $name, ... dữ liệu để sửa
//$id_value giá trị điều kiện sửa sản phẩm theo id
function update_product($cate_id, $name, $description, $image, $detail, $price, $sale, $status, $update, $id_value)
{
    $data = [
        'cate_id' => $cate_id,
        'name' => $name,
        'description' => $description,
        'image' => $image,
        'detail' => $detail,
        'price' => $price,
        'sale' => $sale,
        'status' => $status,
        'updated_at' => $update
    ];
    return update('products', $data, 'id', $id_value);
}
//Hàm cập nhật lượng view (số lượng lượt xem bài)
function update_view_product($id)
{
    $sql = "UPDATE products SET view=view+1 WHERE id=$id";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
