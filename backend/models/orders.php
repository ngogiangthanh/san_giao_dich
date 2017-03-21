<?php

/**
 * Lấy thông tin chi tiết đơn hàng
 * @param int
 * @return array
 */
function order_detail($oid) {
    $sql = "SELECT
            product.ID,
            product.NAME_PRO,
            product.URL,
            product.THUMB,
            details_order.AMOUNT,
            FORMAT(product.PRICE_USD,2)  as PRICE_USD,
            FORMAT(product.PRICE_VND,-2) as PRICE_VND
            FROM
            details_order
            INNER JOIN product ON details_order.ID_PRO = product.ID
            WHERE
            details_order.ID_ORDER = " . $oid . "
            ORDER BY
            product.NAME_PRO ASC,
            product.ID ASC";
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

/**
 * Danh sách đơn hàng
 * @param array
 * @return list array
 */
function orders($options = array()) {
    $where = (isset($options['where']) ? "WHERE " . $options['where'] : "");
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    $sql = "SELECT
        orders.ID,
        `user`.name,
        DATE_FORMAT(orders.TIME_ORDER,'%d/%m/%Y (%h:%i:%s %p)') as TIME_ORDER,
        DATE_FORMAT(orders.TIME_PROCESS,'%d/%m/%Y (%h:%i:%s %p)') as TIME_PROCESS,
        orders.STATUS_ORDER
        FROM
        orders
        INNER JOIN `user` ON orders.ID_CUSTOMER = `user`.ID "
            . $where . " " . $order_by . " " . $limit;
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

/**
 * Lay mot đơn hàng
 * @param int
 * @return array
 */
function get_a_order($oid) {
    $sql = "SELECT
            orders.ID,
            `user`.NAME,
            DATE_FORMAT(orders.TIME_ORDER,'%d/%m/%Y (%h:%i:%s %p)') as TIME_ORDER,
            DATE_FORMAT(orders.TIME_PROCESS,'%d/%m/%Y (%h:%i:%s %p)') as TIME_PROCESS,
            orders.STATUS_ORDER,
            `user`.ADDRESS,
            `user`.STREET,
            `user`.DISTRICT,
            `user`.PROVINCE,
            `user`.NUMBERPHONE,
            `user`.EMAIL,
            `user`.POINT,
            orders.ID_CUSTOMER,
            orders.PRICE_SET,
            orders.CURRENT_POINTS
            FROM
            orders
            INNER JOIN `user` ON orders.ID_CUSTOMER = `user`.ID
            WHERE 
            orders.ID=" . $oid;
    $query = mysql_query($sql) or die(mysql_error());

    //dữ liệu trả về
    $data = array();
    if (mysql_num_rows($query) > 0) {
        $data = mysql_fetch_assoc($query);
        mysql_free_result($query);
    }
    return $data;
}

/**
 * Xoa don hang
 * @param int
 * @return none
 */
function orders_delete($oid,$status) {
    $oid = intval($oid);
    $sql = "DELETE FROM orders WHERE id=$oid";
    if (mysql_query($sql)) {
        $status = 'true';
    } else {
        $status = 'false';
    }
    return $status;
}

/**
 * Trả về tổng số bản ghi thỏa mãn điều kiện trong $option.
 * @param array
 * @return int
 */
function get_order_total($options = array()) {
    //xử lý $options
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';

    //truy vấn        
    $sql = "SELECT "
            . "COUNT(*) as total "
            . "FROM "
            . "orders
                INNER JOIN `user` ON orders.ID_CUSTOMER = `user`.ID "
            . $where;
    $query = mysql_query($sql) or die(mysql_error());

    //dữ liệu trả về
    $row = mysql_fetch_assoc($query);

    return $row['total'];
}
