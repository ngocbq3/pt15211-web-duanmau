<?php
require_once 'database.php';

//Kiểm tra user khi login
function check_user($username)
{
    $sql = "select * from users where username='$username'";
    $user =  query($sql);
    if (count($user) > 0) {
        return $user[0];
    }
    return false;
}
