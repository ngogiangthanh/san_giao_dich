<?php

//load model
require_once('backend/models/products.php');
//title website ================================================================
$title = BRANCH_TITLE_INDEX;
//============
if (isset($_POST['search'])) {
    header('location:admin.php?controller=wheretobuy&search=' . $_POST['search']);
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

$url = 'admin.php?controller=wheretobuy';

if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "LOWER(branches.NAME_BRANCH) LIKE LOWER('%$search%') ";
    $url = 'admin.php?controller=wheretobuy&search=' . $_GET['search'];
}

$total_rows = get_total('branches', $options);
$total = ceil($total_rows / $limit);
//data
$branches = get_all('branches', $options);
$pagination = pagination($url, $page, $total);
//load view ====================================================================
require 'backend/views/wheretobuy/index.php';
