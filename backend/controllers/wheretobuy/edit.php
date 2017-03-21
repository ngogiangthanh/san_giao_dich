<?php

//Title website ===============================================================
if (isset($_GET['bid'])) {
    $bid = intval($_GET['bid']);
} else {
    $bid = 0;
}
$title = ($bid == 0) ? BRANCH_ADD_TITLE_INDEX : BRANCH_UPDATE_TITLE_INDEX;
// get data  ===================================================================
$branch = get_a_record('branches',$bid);
//load View  ===================================================================
require('backend/views/wheretobuy/edit.php');
