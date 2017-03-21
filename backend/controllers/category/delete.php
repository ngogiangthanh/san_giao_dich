<?php

//load model
require_once('backend/models/categories.php');

$cid = intval($_GET['cid']);

$status = 'none';
$status = categories_delete($cid, $status);

$url = 'location:admin.php?controller=category';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';

header($url);
