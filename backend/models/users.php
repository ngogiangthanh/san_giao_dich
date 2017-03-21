<?php

/**
 * Đăng nhập hệ thống
 * @param  string
 * @param  string
 * @return boolean
 */
function admin_login($user, $password) {
    $sql = "SELECT * FROM `user` WHERE username='$user' AND password='$password' AND ROLE = 1 LIMIT 0,1";
    $query = mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($query) > 0) {
        $result = mysql_fetch_row($query);
        $_SESSION['login'] = $result;
        $_SESSION['refresh'] = 'yes_login';
        return true;
    }
    return false;
}

/**
 * Xóa thông tin trong bảng user
 * @param int
 * @param  string
 * @return string true or false
 */
function user_delete($id, $status) {
    $id = intval($id);
    $sql = "DELETE FROM `user` WHERE id=$id";
    if (mysql_query($sql)) {
        $status = 'true';
    } else {
        $status = 'false';
    }
    return $status;
}

/**
 * Lấy thông tin một người dùng trong user
 * @param int
 * @return array
 */
function get_a_user($id) {
    //truy vấn
    $id = intval($id);
    $sql = "SELECT `user`.ID,
            `user`.USERNAME,
            `user`.`NAME`,
             DATE_FORMAT(`user`.BIRTH,'%d/%m/%Y') as BIRTH,
            `user`.ADDRESS,
            `user`.STREET,
            `user`.DISTRICT,
            `user`.PROVINCE,
            `user`.NUMBERPHONE,
            `user`.EMAIL,
            `user`.ROLE,
            `user`.POINT,
            `user`.`STATUS` 
            FROM `user` WHERE id= $id";
    $query = mysql_query($sql) or die(mysql_error());

    //dữ liệu trả về
    $data = NULL;
    if (mysql_num_rows($query) > 0) {
        $data = mysql_fetch_assoc($query);
        mysql_free_result($query);
    }
    return $data;
}
