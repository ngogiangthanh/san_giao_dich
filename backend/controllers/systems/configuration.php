<?php
// Load model===================================================================

require_once('libraries/functions.php');

//Title ========================================================================
$title = "Trang chủ chỉnh sửa cấu hình hệ thống";

$time_zones = get_time_zones_list();

$configs = read_configuration_info();

//load view ====================================================================
require('./backend/views/systems/configuration.php');