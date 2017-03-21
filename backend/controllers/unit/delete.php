<?php

//load model
require_once('backend/models/unit.php');

$cid = intval($_GET['cid']);
$status = 'none';
$status = unit_delete($cid, $status);

$url = 'location:admin.php?controller=unit';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';

header($url);
