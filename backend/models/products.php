<?php

/**
 * Xóa bản ghi có khóa chính là $id
 */
function products_delete($id,$status) {
    $id = intval($id);
    $product = get_a_record_product($id);
    $url = $product['URL'];
    $thumb = $product['THUMB'];
    if (is_file($url)) {
        unlink($url);
    }
    if (is_file($thumb)) {
        unlink($thumb);
    }
    $sql = "DELETE FROM product WHERE id=$id";
    if (mysql_query($sql)) {
        $status = 'true';
    } else {
        $status = 'false';
    }
    return $status;
}

function products($options = array()) {

    $where = (isset($options['where']) ? "WHERE " . $options['where'] : " ");
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    $sql = "SELECT
                product.ID,
                category.NAME_CAT,
                product.NAME_PRO,
                FORMAT(product.PRICE_USD,2)  as PRICE_USD,
                FORMAT(product.PRICE_VND,-2) as PRICE_VND,
                product.THUMB
                FROM
                product
                INNER JOIN category ON product.ID_CAT = category.ID 
                " . $where .
                "ORDER BY category.NAME_CAT ASC,
                product.NAME_PRO ASC,
                product.ID ASC 
                " . $limit;
    $query = mysql_query($sql) or die(mysql_error());

    //dữ liệu trả về
    $data = array();
    if (mysql_num_rows($query) > 0) {
        while ($row = mysql_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysql_free_result($query);
    }
    return $data;
}

function get_a_record_product($id) {
    $sql = "SELECT
                product.ID,
                unit.UNIT_NAME,
                product.ID_UNIT,
                category.NAME_CAT,
                product.ID_CAT,
                product.INFO_PRO,
                product.NAME_PRO,
                FORMAT(product.PRICE_USD,2)  AS PRICE_USD,
                FORMAT(product.PRICE_VND,-2) as PRICE_VND,
                product.URL,
                product.THUMB,
                product.URL_PDF
                FROM
                product
                INNER JOIN unit ON product.ID_UNIT = unit.ID
                INNER JOIN category ON product.ID_CAT = category.ID 
                WHERE 
                product.ID = " . $id;
    $query = mysql_query($sql) or die(mysql_error());
    //dữ liệu trả về
    $data = array();
    if (mysql_num_rows($query) > 0) {
        $data = mysql_fetch_assoc($query);
        mysql_free_result($query);
    }
    return $data;
}
