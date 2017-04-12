<?php
// Load model===================================================================


//Title ========================================================================
$title = "Trang chủ chỉnh sửa logo - banner";
require_once('backend/models/info.php');

$banner = infoSelect($conn->app, 4);
$logo = infoSelect($conn->app, 5);

//load view ====================================================================
require('./backend/views/systems/logo.php');