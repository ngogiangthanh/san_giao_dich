<?php

//load model
require_once('backend/models/model.php');
require_once('backend/models/products.php');

$pid = intval($_GET['pid']);
$status = 'none';
$status = products_delete($pid, $status);

$url = 'location:admin.php?controller=product';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';

header($url);
