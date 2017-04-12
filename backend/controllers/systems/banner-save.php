<?php

require_once('backend/models/info.php');

if (isset($_FILES["file"]["type"])) {
    $id = intval($_POST['id']);
    $configImg = array(
        'name' => "logo",
        'upload_path' => URL_UPLOAD_LOGO_BANNER,
        'allowed_exts' => 'jpg|png|jpeg',
        'type' => 'image',
        'max_size' => 1
    );
    $rs = upload('file', $configImg);
    $result = infoUpdate($conn->app, $id, array("noi_dung" => $rs['img'], "id_user" => $_SESSION['login']['ID']));

    echo json_encode($result ? array("result" => "true", "message" => "Cập nhật hình ảnh thành công!", "url" => $rs['img']) : array("result" => "false", "message" => "Cập nhật hình ảnh thất bại!"), JSON_UNESCAPED_UNICODE);
}