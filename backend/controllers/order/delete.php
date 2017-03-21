<?php

require_once('backend/models/orders.php');
$url = 'location:admin.php?controller=order';
if (isset($_GET['oid'])) {
    $status = 'none';
    $oid = intval($_GET['oid']);
    $status = orders_delete($oid);
    $url .= ($status != 'none') ? '&statusdelete=' . $status : '';
    header($url);
} else {
    header($url);
}

