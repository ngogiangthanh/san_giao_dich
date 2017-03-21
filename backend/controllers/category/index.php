<?php

//load model
require_once('backend/models/categories.php');

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
    'order_by' => 'name_cat ASC'
);

$url = 'admin.php?controller=category';
$total_rows = get_total('category', $options);
$total = ceil($total_rows / $limit);

//data
$title = CATEGORY_TITLE_INDEX;
$categories = get_all('category', $options);
$pagination = pagination($url, $page, $total);

//load view
require('backend/views/category/index.php');
