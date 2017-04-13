<?php
session_start();
define("ADMINISTRATOR", 2);
define("ADMINISTRATOR_VERSION", "v1.0");
define("LIMIT_PER_PAGE", 5);
define("PAGING_PREVIOUS", 'Trang trước');
define("PAGING_NEXT", 'Trang kế');
define("PAGING_FIRST", 'Trang đầu');
define("PAGING_END", 'Trang cuối');
define("URL_UPLOAD", "./uploads/images/avatar/");
define("URL_UPLOAD_LOGO_BANNER", "./uploads/images/");
include_once './libraries/functions.php';
include_once './libraries/workwithdb.php';
chmod("./uploads", 777);   // decimal; probably incorrect
chmod("./libraries/imageuploader", 777);   // decimal; probably incorrect
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
//echo file_put_contents("./libraries/test.php","Hello World. Testing!");

    $conn->CloseConnection();
} else {
    //404 page error
}

