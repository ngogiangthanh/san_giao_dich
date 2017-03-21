<?php

//load model
require_once('backend/models/products.php');

if (isset($_POST['search'])) {
    header('location:admin.php?controller=product&search=' . $_POST['search']);
}

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$page = ($page > 0) ? $page : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$options = array(
    'limit' => $limit,
    'offset' => $offset
);

$url = 'admin.php?controller=product';

if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "LOWER(product.name_pro) LIKE LOWER('%$search%') ";
    $url = 'admin.php?controller=product&search=' . $_GET['search'];
}

$total_rows = get_total('product', $options);
$total = ceil($total_rows / $limit);
//data
$title = PRODUCT_TITLE_INDEX;
$products = products($options);
$pagination = pagination($url, $page, $total);
//load view
require('backend/views/product/index.php');
