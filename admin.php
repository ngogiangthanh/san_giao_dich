<?php
session_start();
define("ADMINISTRATOR", 2);
include_once './libraries/functions.php';
include_once './libraries/workwithdb.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$file = 'backend/controllers/' . $controller . '/' . $action . '.php';

if (file_exists($file)) {
    
    $conn = new workwithdb();
    $conn->CreateConnection();
    
    if (isset($_SESSION['login']) && $_SESSION['login']['QUYEN_HAN'] == ADMINISTRATOR) {
        require($file);
    } else {
        require('backend/controllers/home/login.php');
    }
    
    $conn->CloseConnection();
} else {
    //404 page error
}

