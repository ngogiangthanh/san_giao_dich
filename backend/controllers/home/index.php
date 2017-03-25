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


$totalContact = contactCount($conn->dbh);
$totalIdea = ideaCount($conn->dbh);
$totalSolution = solutionCount($conn->dbh);
$totalUser = userCount($conn->dbh);
//load view ====================================================================
require('./backend/views/home/index.php');