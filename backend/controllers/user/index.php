<?php

//title website ================================================================
$title = CUSTOMER_TITLE_INDEX;
//paging =======================================================================
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}
$page = ($page > 0) ? $page : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => 'role = 0',
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id ASC'
);
//data of paging ===============================================================
//Search data ==================================================================
$url = 'admin.php?controller=user';
if (isset($_POST['search'])) {
    header('location:admin.php?controller=user&search=' . $_POST['search']);
}
if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "(LOWER(`user`.USERNAME) LIKE LOWER('%$search%') OR LOWER(`user`.NAME) LIKE LOWER('%$search%')) AND `user`.ROLE = 0";
    $url = 'admin.php?controller=user&search=' . $_GET['search'];
}
$total_rows = get_total('user', $options);
$total = ceil($total_rows / $limit);
$pagination = pagination($url, $page, $total);
//data show ====================================================================
$users = get_all('user', $options);
//load view ====================================================================
require('backend/views/user/index.php');

