<?php

//load model
require_once('backend/models/orders.php');

if (isset($_POST['search'])) {
    header('location:admin.php?controller=order&search=' . $_POST['search']);
}

if (isset($_GET['page']))
    $page = intval($_GET['page']);
else
    $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$options = array(
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'orders.status_order ASC, `user`.name ASC'
);

$url = 'admin.php?controller=order';

if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "LOWER(`user`.NAME) LIKE LOWER('%$search%') ";
    $url = 'admin.php?controller=order&search=' . $_GET['search'];
}

$total_rows = get_order_total($options);
$total = ceil($total_rows / $limit);

//data
$title = ORDER_TITLE_INDEX;
$orders = orders($options);
$pagination = pagination($url, $page, $total);
$status = array(
    0 => ORDER_STATUS_WAIT,
    1 => ORDER_STATUS_SUCCESS,
    2 => ORDER_STATUS_DESTROY
);

//load view
require('backend/views/order/index.php');
