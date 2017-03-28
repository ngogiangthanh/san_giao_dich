<?php

require_once('backend/models/users.php');

if (isset($_FILES["file"]["type"])) {
    $image_name = $_POST['tai_khoan'];
    $configImg = array(
        'name' => $image_name,
        'upload_path' => URL_UPLOAD,
        'allowed_exts' => 'jpg|png|jpeg',
        'type' => 'image',
        'max_size' => 5
    );
    $rs = upload('file', $configImg);
    $result = userUpdate($conn->app, $_POST['id'], array("url_dai_dien" => $rs['thumb']));

    echo json_encode($result ? array("result" => "true", "message" => "Cập nhật hình ảnh thành công!", "url" => $rs['thumb']) : array("result" => "false", "message" => "Cập nhật hình ảnh thất bại!"), JSON_UNESCAPED_UNICODE);
}