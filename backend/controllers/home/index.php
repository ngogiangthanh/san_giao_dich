<?php
// Load model===================================================================
require_once('backend/models/contacts.php');
require_once('backend/models/ideas.php');
require_once('backend/models/solutions.php');
require_once('backend/models/users.php');
//Title ========================================================================
$title = "Trang chủ quản lý hệ thống";
$gender = array(
    1 => "Nam",
    2 => "Nữ",
    3 => "Không xác định"
);


$totalContact = contactCount(null,null, null, null, null, null, $conn->app);
$totalIdea = ideaCount($conn->app);
$totalSolution = solutionCount($conn->app);
$totalUser = userCount($conn->app);
//load view ====================================================================
require('./backend/views/home/index.php');