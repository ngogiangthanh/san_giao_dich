<?php

//load model
$cid = intval($_GET['cid']);
delete('contact', $cid);
$status = 'true';
$url = 'location:admin.php?controller=contact';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';
header($url);
