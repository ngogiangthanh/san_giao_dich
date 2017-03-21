<?php

//load model
require_once('backend/models/orders.php');
require_once('backend/models/promotion.php');
//data
$title = ORDER_TITLE_VIEW;

if (isset($_GET['oid']))
    $oid = intval($_GET['oid']);
else
    $oid = 0;
$order = get_a_order($oid);

if (!$order) {
    show_404();
}

$order_detail = order_detail($oid);
$status = array(
    0 => ORDER_STATUS_WAIT,
    1 => ORDER_STATUS_SUCCESS,
    2 => ORDER_STATUS_DESTROY
);

//load view
require('backend/views/order/view.php');
