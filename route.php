<?php

/**
 * Gọi các controller và view tương ứng
 * @author Chuột
 * @modified 05/07/2014
 */
session_start();
include_once './libraries/language.php';
include_once './libraries/workwithdb.php';
include_once './libraries/functions.php';
include_once './frontend/controllers/HomeController.php';
//Khoi tao doi tuong ngon ngu
$language = new language();
$language->checkSESSIONLanguage(isset($_GET['lang']));
$language->CreateNewSessionLang();
$language->IncludeLangUserUI();
//Create connect to DB
$conn = new workwithdb();
$conn->CreateConnection();
//Bo dinh tuyen cho cac yeu cau tu views
switch (escape(isset($_GET['content']) ? $_GET['content'] : "home")) {
    case 'home':
        GetIndex();
        break;
    case 'idea':
        GetIdea();
        break;
    case 'solution':
        GetSolution();
        break;
    case 'about-us':
        GetAboutUs();
        break;
    case 'contact':
        GetContact();
        break;
    case 'register':
        GetRegister();
        break;
    case 'login':
        GetLogin();
        break;
    default:
        GetIndex();
        break;
}
//Close connection
$conn->CloseConnection();

