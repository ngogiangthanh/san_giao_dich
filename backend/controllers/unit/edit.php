<?php

//load model
require_once('backend/models/unit.php');

//if form submit 
if (!empty($_POST)) {
    $unit = array(
        'id' => intval($_POST['id']),
        'unit_name' => escape($_POST['name'])
    );
    save('unit', $unit);
    header('location:admin.php?controller=unit&statusupdate=true');
}

if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
} else {
    $cid = 0;
}

//data
$title = ($cid == 0) ? UNIT_TITLE_ADD : UNIT_TITLE_EDIT;
$unit = get_a_record('unit', $cid);

//load view
require('backend/views/unit/edit.php');
