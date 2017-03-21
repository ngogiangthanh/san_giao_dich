<?php

//load model
require_once('backend/models/branches.php');
$bid = intval($_GET['bid']);
$status = 'none';
$status = branches_delete($bid, $status);

$url = 'location:admin.php?controller=wheretobuy';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';

header($url);
