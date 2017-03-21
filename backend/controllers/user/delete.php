<?php

//Load model ===================================================================
require_once('backend/models/users.php');
// Delete ======================================================================
$pid = intval($_GET['uid']);
$status = 'none';
$status = user_delete($pid, $status);
// Direct ======================================================================
$url = 'location:admin.php?controller=user';
$url .= ($status != 'none') ? '&statusdelete=' . $status : '';
header($url);
