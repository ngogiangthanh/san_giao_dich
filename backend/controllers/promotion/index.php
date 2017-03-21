<?php

// Load model ==================================================================
require_once('backend/models/promotion.php');
//title website ================================================================
$title = PROMOTION_TITLE_INDEX;
//paging =======================================================================

if (isset($_GET['page']))
    $page = intval($_GET['page']);
else
    $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$options = array(
    'limit' => $limit,
    'offset' => $offset
);
//data of paging ===============================================================
//Search data ==================================================================
$url = 'admin.php?controller=promotion';
if (isset($_POST['search'])) {
    header('location:admin.php?controller=promotion&search=' . $_POST['search']);
}

if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $options['where'] = "LOWER(promotions.NAME_PROMOTION) LIKE LOWER('%$search%') ";
    $url = 'admin.php?controller=promotion&search=' . $_GET['search'];
}
$total_rows = get_promotions_total($options);
$total = ceil($total_rows / $limit);
$pagination = pagination($url, $page, $total);
//data show ====================================================================
$options["order by"] = "promotions.TIME_START ASC,
                        promotions.TIME_END ASC,
                        promotions.ID ASC";
$promotions = promotions($options);
//load view ====================================================================
require('backend/views/promotion/index.php');
