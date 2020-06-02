<?php
require_once 'database.php';

function search_product($name)
{
    $sql = "SELECT 
    p.id as id_product, 
    p.name as name_product, 
    p.image as image_product, 
    status, 
    price 
    FROM products p INNER JOIN categories c ON p.cate_id=c.id 
    WHERE p.name LIKE '%$name%'";

    return query($sql);
}
