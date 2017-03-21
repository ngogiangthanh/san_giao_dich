<?php

// Load model ==================================================================
// require_once('backend/models/users.php');
require_once('backend/models/promotion.php');
// Title website ===============================================================
$title = PROMOTION_TITLE_VIEW;
// get data  ===================================================================
if (isset($_GET['pid'])) {
    $pid = intval($_GET['pid']);
    $promotion = get_a_promotion($pid);

    if (count($promotion) == 0) {
        header("location:admin.php?controller=promotion");
    } else {
        $promotion_products_list = get_products_of_promotion($pid);
    }
} else {
    header("location:admin.php?controller=promotion");
}
//load View  ===================================================================
require('backend/views/promotion/view.php');
