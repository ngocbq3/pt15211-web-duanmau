<?php
require_once 'database.php';

//Kiểm tra user khi login
function check_user($username)
{
    $arr = [
        'username',
        '=',
        $username
    ];
    $user =  query_where('users', $arr);
    if (count($user) > 0) {
        return $user[0];
    }
    return false;
}
