<?php
// Load model===================================================================
require_once('backend/models/category.php');

//Title ========================================================================
$title = "Trang chủ chỉnh sửa chuyên mục con";
$status = array(
    0 => "<input type='checkbox' name='checkboxes' id='checkboxes-hide' value='0'>",
    1 => "<input type='checkbox' name='checkboxes' id='checkboxes-show' value='1' checked/>"
);

$Categories = categorySelect($conn->app);
$CategoryCount = count($Categories);
//load view ====================================================================
require('./backend/views/systems/category.php');