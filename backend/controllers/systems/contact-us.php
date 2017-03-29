
<?php
// Load model===================================================================


//Title ========================================================================
$title = "Trang chủ chỉnh sửa thông tin liên hệ";
require_once('backend/models/info.php');

$map = infoSelect($conn->app, 2);
$map_elements = explode('[]', $map->THONG_TIN_TO_CHUC);
$contact_info = infoSelect($conn->app, 3);

//load view ====================================================================
require('./backend/views/systems/contact-us.php');
