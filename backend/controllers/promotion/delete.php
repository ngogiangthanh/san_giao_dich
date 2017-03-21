<?php

//load model
require_once('backend/models/model.php');

$pid = intval($_GET['pid']);

$status = 'none';
$status = delete('promotions', $pid);

$url = 'location:admin.php?controller=promotion&statusdelete=true';
header($url);
