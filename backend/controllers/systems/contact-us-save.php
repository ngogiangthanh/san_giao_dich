
<?php

// Load model===================================================================
//Title ========================================================================
require_once('backend/models/info.php');

if (isset($_POST)) {
    $id_map = intval($_POST['id_info_map']);
    $id_contact = intval($_POST['id_info_contact']);

    $data_map = array(
        "noi_dung" => html_entity_decode($_POST['apikey'] . "[]" . $_POST['dia-diem']),
        "id_user" => $_SESSION['login']['ID']);
    $data_contact = array(
        "noi_dung" => html_entity_decode($_POST['noi_dung_lh']),
        "id_user" => $_SESSION['login']['ID']);
    if (infoUpdate($conn->app, $id_map, $data_map) & infoUpdate($conn->app, $id_contact, $data_contact)) {
        $_SESSION['message']['success'] = "Sửa thông tin liên hệ hoàn tất!";
    } else {
        $_SESSION['message']['error'] = "Sửa thông tin liên hệ không thành công!";
    }
}

$url = 'admin.php?controller=systems&action=contact-us';

header('location:' . $url);
