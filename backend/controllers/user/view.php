<?php

// Load model ==================================================================
require_once('backend/models/users.php');
require_once('backend/models/orders.php');
// Title website ===============================================================
$title = CUSTOMER_TITLE_VIEW;
// get data  ===================================================================
if (isset($_GET['uid'])) {
    $uid = intval($_GET['uid']);
    $user = get_a_user($uid);

    if (count($user) == 0) {
        header("location:admin.php?controller=user");
    } else {
        $orders_list = orders(array(
            'where' => 'orders.ID_CUSTOMER=' . $uid,
            'order_by' => 'ID ASC'));
        $statusorder = array(
            0 => ORDER_STATUS_WAIT,
            1 => ORDER_STATUS_SUCCESS,
            2 => ORDER_STATUS_DESTROY);
    }
} else {
    header("location:admin.php?controller=user");
}
//load View  ===================================================================
require('backend/views/user/view.php');
