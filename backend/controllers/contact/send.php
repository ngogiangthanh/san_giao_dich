<?php

if (!empty($_POST)) {
    $contactz = array(
        'id' => intval($_POST['id']),
        'email' => $_POST['email'],
        'status' => 1,
        'respone' => escape($_POST['respone'])
    );
    save('contact', $contactz);
    //load view
    $id =  intval($_POST['id']);
    require('libraries/sendmail/sendauth.php');
  //$url = 'location:admin.php?controller=contact&action=respone&cid=' . intval($_POST['id']) . '&statusupdate=true';
  //  header($url);
}