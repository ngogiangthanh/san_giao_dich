<?php

//load model
require_once('backend/models/unit.php');

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
    'order_by' => 'unit_name ASC'
);

$url = 'admin.php?controller=unit';
$total_rows = get_total('unit', $options);
$total = ceil($total_rows / $limit);

//data
$title = UNIT_TITLE_INDEX;
$categories = get_all('unit', $options);
$pagination = pagination($url, $page, $total);

//load view
require('backend/views/unit/index.php');
