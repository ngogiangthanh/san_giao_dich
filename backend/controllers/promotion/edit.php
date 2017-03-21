<?php

// Load model ==================================================================
require_once('backend/models/promotion.php');
// Title website ===============================================================
if (isset($_GET['pid']))
    $pid = intval($_GET['pid']);
else
    $pid = 0;
$title = ($pid == 0) ? PROMOTION_TITLE_ADD : PROMOTION_TITLE_EDIT;
// get data  ===================================================================
$promotion = get_a_promotion($pid);
// edit process  ===============================================================
if (!empty($_POST)) {
    $statusUpdate = 'none';
    $pidedit = intval($_POST['id']);
    if (!is_duplicate_promotion($pidedit, date('Y-m-d', strtotime($_POST['timestart'])), date('Y-m-d', strtotime($_POST['timeend'])))) {
        $promotion = array(
            'id' => intval($_POST['id']),
            'name_promotion' => escape($_POST['name_promotion']),
            'content_promotion' => escape($_POST['summary']),
            'time_start' => date('Y-m-d', strtotime($_POST['timestart'])),
            'time_end' => date('Y-m-d', strtotime($_POST['timeend']))
        );
        $pid = save('promotions', $promotion);
        $statusUpdate = 'true';
        $url = 'location:admin.php?controller=promotion&action=edit&pid=' . $pid;
    } else {
        $statusUpdate = 'false';
        $url = 'location:admin.php?controller=promotion&action=edit&pid=' . $pidedit;
    }
    $url .= ($statusUpdate != 'none') ? '&statusupdate=' . $statusUpdate : '';
    header($url);
}
//load View  ===================================================================
require('backend/views/promotion/edit.php');
