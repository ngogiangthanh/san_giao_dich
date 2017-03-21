<?php

//load model
require_once('backend/models/model.php');
require_once('backend/models/users.php');

//if form submit 
if (!empty($_POST)) {
    $statusupdate = 'none';
    $user = array(
        'id' => intval($_POST['id']),
        'email' => escape($_POST['email']),
        'name' => escape($_POST['name']),
        'address' => escape($_POST['address']),
        'numberphone' => escape($_POST['phone'])
    );
    if (!empty($_POST['password'])) {
        $user['PASSWORD'] = md5($_POST['password']);
        save('user', $user);
        $statuspassword = 'true';
        require('backend/controllers/home/logout.php');
    } else {
        $statusupdate = 'true';
        save('user', $user);
        $_SESSION['login'][10] = $user['email'];
        $_SESSION['login'][3] = $user['name'];
        $_SESSION['login'][6] = $user['address'];
        $_SESSION['login'][9] = $user['numberphone'];
        //chuyển hướng
        $url = 'location:admin.php?controller=user&action=info';
        $url .= ($statusupdate != 'none') ? '&statusupdate=' . $statusupdate : '';
        header($url);
    }
}

//data
$title = CUSTOMER_TITLE_INFO;
//load view
require('backend/views/user/info.php');
