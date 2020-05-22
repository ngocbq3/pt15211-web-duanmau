<?php

//Hàm kết nối đến cơ sở dữ liệu
function connection()
{
    try {
        $conn = new PDO("mysql:host=localhost; dbname=pt15211_web204; charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "Lỗi kết nối đến cơ sở dữ liệu " . $e->getMessage();
    }
    return $conn;
}
//Hàm lấy toàn bộ dữ liệu của 1 bảng $table
function listAll($table)
{
    $conn = connection();
    try {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi xử lý dữ liệu " . $e->getMessage();
    } finally {
        unset($conn);
    }
    return $result;
}
