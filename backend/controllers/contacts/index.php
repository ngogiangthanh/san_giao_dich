<?php
// Load model===================================================================
require_once('backend/models/contacts.php');

//Title ========================================================================
$title = "Trang chủ quản lý các liên hệ";

$search = null;
$status = null;
$spam = 2;
$trash = 2;
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
        if($status_arr[$_GET['status']] == 4){
            $spam = 1;
        }
        else if($status_arr[$_GET['status']] == 5){
            $trash = 1;
        }
        else{
           $status = $status_arr[$_GET['status']];
        }
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


$contactCount = contactCount($search, $status, $seen, $important, $spam, $trash, $conn->app);
$contactCountAll = contactCount(null, null, null, null, 2, 2, $conn->app);
$contactSpamCount = contactCount(null, null, null, null, 1, null, $conn->app);
$contactTrashCount = contactCount(null, null, null, null, null, 1, $conn->app);
$contacts = contactSelect($search, $status, $seen, $important, $spam, $trash, $offset, LIMIT_PER_PAGE, $conn->app);
$total = ceil($contactCount / LIMIT_PER_PAGE);
$pagination = pagination($url, $page, $total);
$actual_link = explode("&search",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[0];
//load view ====================================================================
require('./backend/views/contacts/index.php');