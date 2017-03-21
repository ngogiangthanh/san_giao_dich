<?php

//if form submit 
if (isset($_FILES['img'])) {
    //upload ảnh	
    if ($_FILES['img']['name'] != '') {
        $image_name = "logo";
        $configImg = array(
            'name' => $image_name,
            'upload_path' => './public/img/',
            'allowed_exts' => 'png',
            'type' => 'image'
        );
        $statusUpdateImg = upload('img', $configImg);
    }
}
//chuyển hướng

$url = 'location:admin.php?controller=logo';
$url .= ($statusUpdateImg == '' || $statusUpdateImg == null) ? '&statusupdate=false' : '&statusupdate=true';
header($url);


