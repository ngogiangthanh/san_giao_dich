<?php

//if form submit 
if (!empty($_POST)) {
    $statusUpdate = 'none';
    $branch = array(
        'id' => intval($_POST['id']),
        'name_branch' => escape($_POST['name']),
        'descripte_branch' => escape($_POST['summary'])
    );
    $bid = save('branches', $branch);
    $statusUpdate = 'true';
    //chuyển hướng
    $url = 'location:admin.php?controller=wheretobuy&action=edit&bid=' . $bid;
    $url .= ($statusUpdate != 'none') ? '&statusupdate=' . $statusUpdate : '';
    header($url);
}


