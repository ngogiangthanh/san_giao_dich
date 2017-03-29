
<?php
// Load model===================================================================


//Title ========================================================================
$title = "Trang chủ chỉnh sửa thông tin giới thiệu";
require_once('backend/models/info.php');

$about_us = infoSelect($conn->app, 1);

//load view ====================================================================
require('./backend/views/systems/about-us.php');
