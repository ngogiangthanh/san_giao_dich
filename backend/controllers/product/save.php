<?php

//if form submit 
if (!empty($_POST)) {
    $statusUpdateImg = 'none';
    $statusUpdatePDF = 'none';
    $statusUpdate = 'none';
    $name = escape($_POST['name']);
    $product = array(
        'id' => intval($_POST['id']),
        'id_cat' => intval($_POST['id_cat']),
        'id_unit' => intval($_POST['id_unit']),
        'name_pro' => $name,
        'info_pro' => escape($_POST['summary']),
        'price_vnd' => round(str_replace(',', '', $_POST['price_vnd']), -2),
        'price_usd' => $_POST['price_usd']
    );
    $pid = save('product', $product);
    $statusUpdate = 'true';
    //upload ảnh	
    if ($_FILES['img']['name'] != '') {
        $image_name = "pro_" . $pid;
        $configImg = array(
            'name' => $image_name,
            'upload_path' => './public/products/imgs/',
            'allowed_exts' => 'jpg|jpeg|png|gif',
            'type' => 'image'
        );
        $image = upload('img', $configImg);
        //cập nhật ảnh mới
        if ($image) {
            $product = array(
                'id' => $pid,
                'URL' => $image['img'],
                'THUMB' => $image['thumb']
            );
            save('product', $product);
            $statusUpdateImg = 'true';
        } else {
            $statusUpdateImg = 'false';
        }
    }
    //upload pdf
    if ($_FILES['pdf']['name'] != '') {
        $pdf_name = "pdf_pro_" . $pid;
        $configPDF = array(
            'name' => $pdf_name,
            'upload_path' => './public/products/pdf/',
            'allowed_exts' => '*',
            'max_size' => 2,
            'type' => 'pdf'
        );
        $pdf = upload('pdf', $configPDF);
        //cập pdf mới
        if ($pdf) {
            $product = array(
                'id' => $pid,
                'URL_PDF' => $pdf
            );
            save('product', $product);
            $statusUpdatePDF = 'true';
        } else {

            $statusUpdatePDF = 'false';
        }
    }
    //cập nhật chương trình khuyến mãi
    if (isset( $_POST['id_promotion']) && $_POST['id_promotion'] != "choose") {
        save('details_promotion', array(
            'id' => intval($_POST['id_current_promotion']),
            'id_promotion' => intval($_POST['id_promotion']),
            'id_pro' => $pid,
            'price_off' => $_POST['price_off']
        ));
    } else if ($_POST['id_promotion'] == "choose" && intval($_POST['id_current_promotion']) != 0) {
        delete('details_promotion', intval($_POST['id_current_promotion']));
    }
    //chuyển hướng
    $url = 'location:admin.php?controller=product&action=edit&pid=' . $pid;
    $url .= ($statusUpdate != 'none') ? '&statusupdate=' . $statusUpdate : '';
    $url .= ($statusUpdateImg != 'none') ? '&statusimg=' . $statusUpdateImg : '';
    $url .= ($statusUpdatePDF != 'none') ? '&statuspdf=' . $statusUpdatePDF : '';
    header($url);
}


