<?php

//load model
require_once('backend/models/categories.php');

//if form submit 
if (!empty($_POST)) {
    $category = array(
        'id' => intval($_POST['id']),
        'name_cat' => escape($_POST['name'])
    );
    save('category', $category);
    header('location:admin.php?controller=category&statusupdate=true');
} else {
    
}

if (isset($_GET['cid']))
    $cid = intval($_GET['cid']);
else
    $cid = 0;

//data
$title = ($cid == 0) ? CATEGORY_TITLE_ADD : CATEGORY_TITLE_EDIT;
$category = get_a_record('category', $cid);

//load view
require('backend/views/category/edit.php');
