<?php

// Load model===================================================================
require_once('backend/models/contacts.php');

//Title ========================================================================
if (!empty($_POST['id'])) {
    $id = intval($_POST['id']);
    $val = intval($_POST['val']);
    $val = $val == 2 ? 1 : 2;

    $result = contactUpdate($conn->app, $id, array("quan_trong" => $val));

    echo json_encode($result ? array("result" => "true", "message" => $val == 2 ? "Đã bỏ đánh dấu là quan trọng" : "Đã đánh dấu là quan trọng") : array("result" => "false", "message" => $val == 2 ? "Bỏ đánh dấu quan trọng thất bại!" : "Đánh dấu quan trọng thất bại"), JSON_UNESCAPED_UNICODE);
}
