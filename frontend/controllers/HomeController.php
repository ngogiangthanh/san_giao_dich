<?php

/**
 * Thao tác với các views và models liên quan trang index, login,logout
 * @author Chuột
 * @modified 05/07/2014
 */

/**
 * Hiện trang chủ
 * @param string
 * @return void
 */
function GetIndex($title = TITLE_HOME) {
    $content = './frontend/views/home/home.php';
    require_once './frontend/views/layouts/index.php';
}

function GetContact($title = TITLE_CONTACT) {
    $content = './frontend/views/contact/index.php';
    require_once './frontend/views/layouts/index.php';
}

function GetLogin($title = TITLE_LOGIN) {
    $content = './frontend/views/users/login.php';
    require_once './frontend/views/layouts/index.php';
}


function GetRegister($title = TITLE_REGISTER) {
    $content = './frontend/views/users/register.php';
    require_once './frontend/views/layouts/index.php';
}

function GetIdea($title = TITLE_IDEA) {
    $content = './frontend/views/ideas/index.php';
    require_once './frontend/views/layouts/index.php';
}

function GetSolution($title = TITLE_SOLUTION) {
    $content = './frontend/views/solutions/index.php';
    require_once './frontend/views/layouts/index.php';
}

function GetAboutUs($title = TITLE_ABOUT_US) {
    $content = './frontend/views/aboutus/index.php';
    require_once './frontend/views/layouts/index.php';
}


