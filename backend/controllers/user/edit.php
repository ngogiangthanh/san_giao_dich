<?php

if (isset($_GET['uid'])) {
    $uid = intval($_GET['uid']);
    if (isset($_GET['type']) && isset($_GET['check']) && $_GET['type'] == 'save') {
        save('user', array(
            'id' => $uid,
            'status' => $_GET['check']));
    }
}
$status = "true";
header("location:admin.php?controller=user&action=view&uid=" . $uid . "&statusupdate=" . $status);
