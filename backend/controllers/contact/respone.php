<?php

// Load model ==================================================================
// Title website ===============================================================
$title = CONTACT_TITLE_RESPONE;
// get data  ===================================================================
if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
    $contact = get_a_record('contact', $cid);
    if (count($contact) == 0) {
        header("location:admin.php?controller=contact");
    }
} else {
    header("location:admin.php?controller=contact");
}
//load View  ===================================================================
require('backend/views/contact/respone.php');
