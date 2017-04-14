<?php
// Load model===================================================================
require_once('backend/models/contacts.php');

//Title ========================================================================
$title = "Trang chủ quản lý các liên hệ";

$search = null;
$status = null;
$seen = null;
$important = null;
$url = 'admin.php?controller=contacts';

$status_arr = array(
    "wait" => 1,
    "responded" => 2,
    "suspend" => 3,
    "spam" => 4,
    "trash" => 5
);

$important_arr = array(
    "yes" => 1,
    "no" => 0
);

if(isset($_GET['status'])){
    if(array_key_exists($_GET['status'],$status_arr)){
        $status = $status_arr[$_GET['status']];
        $url .= "&status=".$_GET['status'];
    } 
    else {
        $status = null;
    }
}

if(isset($_GET['important'])){
    if(array_key_exists($_GET['important'],$important_arr)){
        $important = $important_arr[$_GET['important']];
        $url .= "&important=".$_GET['important'];
    } 
    else {
        $important = null;
    }
}

if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $url .= "&search=".$search;
}

$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$page = ($page > 0) ? $page : 1;
$offset = ($page - 1) * LIMIT_PER_PAGE;

$contactCount = contactCount($search, $status, $seen, $important, $conn->app);
$contactCountAll = contactCount(null, null, null, null, $conn->app);
$contactSpamCount = contactCount(null, 4, null, null, $conn->app);
$contactTrashCount = contactCount(null, 5, null, null, $conn->app);

$contacts = contactSelect($search, $status, $seen, $important, $offset, LIMIT_PER_PAGE, $conn->app);

$total = ceil($contactCount / LIMIT_PER_PAGE);
$pagination = pagination($url, $page, $total);

//load view ====================================================================
require('./backend/views/contacts/index.php');