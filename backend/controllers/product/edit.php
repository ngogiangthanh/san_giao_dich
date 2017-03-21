<?php

// Load model ==================================================================
require_once('backend/models/products.php');
require_once('backend/models/promotion.php');
// Title website ===============================================================
if (isset($_GET['pid'])) {
    $pid = intval($_GET['pid']);
} else {
    $pid = 0;
}
$title = ($pid == 0) ? PRODUCT_TITLE_ADD : PRODUCT_TITLE_EDIT;
// get data  ===================================================================
$product = get_a_record_product($pid);
if ($pid != 0) {
    $current_promotion = get_product_have_promotion($pid, date("Y-m-d", time()));
}
$promotions = get_all('promotions', array(
    'select' => 'promotions.ID, promotions.NAME_PROMOTION',
    'where' => 'current_date() BETWEEN promotions.TIME_START AND promotions.TIME_END'));
$categories = get_all('category', array(
    'select' => 'ID, NAME_CAT',
    'order_by' => 'NAME_CAT ASC'));
$units = get_all('unit', array(
    'select' => 'ID, UNIT_NAME',
    'order_by' => 'UNIT_NAME ASC'));
//load View  ===================================================================
require('backend/views/product/edit.php');
