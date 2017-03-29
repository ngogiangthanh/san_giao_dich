
<?php

// Load model===================================================================
//Title ========================================================================
require_once('backend/models/info.php');

if (isset($_POST)) {
    $id = intval($_POST['id_info']);

    $data = array(
        "noi_dung" => html_entity_decode($_POST['noi_dung']),
        "id_user" => $_SESSION['login']['ID']);
    if (infoUpdate($conn->app, $id, $data)) {
        $_SESSION['message']['success'] = "Sửa thông tin giới thiệu hoàn tất!";
    } else {
        $_SESSION['message']['error'] = "Sửa thông tin giới thiệu không thành công!";
    }
}

$url = 'admin.php?controller=systems&action=about-us';

header('location:' . $url);
