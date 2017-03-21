<?php

/**
 * Xóa bản ghi có khóa chính là $id
 */
function branches_delete($bid,$status) {
    $bid = intval($bid);
    $sql = "DELETE FROM branches WHERE id=$bid";
    if (mysql_query($sql)) {
        $status = 'true';
    } else {
        $status = 'false';
    }
    return $status;
}