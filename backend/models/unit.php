<?php

/**
 * Xóa bản ghi có khóa chính là $id
 */
function unit_delete($id, $status) {
    $id = intval($id);
    //xóa danh mục
    $sql = "DELETE FROM unit WHERE id=$id";
    if(mysql_query($sql))
    {
        $status = 'true';
    }else{
        $status = 'false';
    }
    return $status;
}
