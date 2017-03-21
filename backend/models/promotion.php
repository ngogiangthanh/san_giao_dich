<?php
/**
 * Lấy thông tin các chương trình khuyến mãi theo option
 * @param array
 * @return list array
 */
function promotions($options = array()) {

    $where = (isset($options['where']) ? "WHERE " . $options['where'] : " ");
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT
            promotions.ID,
            promotions.NAME_PROMOTION,
            promotions.CONTENT_PROMOTION,
            DATE_FORMAT(promotions.TIME_START,'%d/%m/%Y') as TIME_START,
            DATE_FORMAT(promotions.TIME_END,'%d/%m/%Y') as TIME_END
            FROM
            promotions
                " . $where . $limit;
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
 * Trả về tổng số bản ghi thỏa mãn điều kiện trong $option.
 * @param array
 * @return int
 */
function get_promotions_total($options = array()) {

    //truy vấn        
    $where = (isset($options['where']) ? "WHERE " . $options['where'] : " ");

    $sql = "SELECT count(*) as total
                FROM
                promotions
                " . $where;
    $query = mysql_query($sql) or die(mysql_error());

    //dữ liệu trả về
    $row = mysql_fetch_assoc($query);

    return $row['total'];
}

/**
 * Trả về 1 bản ghi phu hop voi id
 * @param int
 * @return array
 */
function get_a_promotion($pid) {
    $sql = "SELECT
                promotions.NAME_PROMOTION,
                promotions.CONTENT_PROMOTION,
                promotions.TIME_START,
                promotions.TIME_END,
                promotions.ID
                FROM
                promotions
                WHERE promotions.ID=" . $pid;
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
 * Kiểm tra trùng lắp chương trình khuyến mãi
 * @param int
 * @param date
 * @param date
 * @return boolean
 */
function is_duplicate_promotion($pid,$timestart,$timeend)
{
    //truy vấn 
    $where = '';
    if($pid != 0)
    $where = "AND promotions.ID <>".$pid;

    $sql = "SELECT
            Count(promotions.ID) as total
            FROM
            promotions
            WHERE
            (('".$timestart."' BETWEEN promotions.TIME_START AND  promotions.TIME_END OR
            '".$timeend."' BETWEEN promotions.TIME_START AND  promotions.TIME_END) OR ('".$timestart."' <= promotions.TIME_START AND
            '".$timeend."' >= promotions.TIME_END)) ".$where;
    $query = mysql_query($sql) or die(mysql_error());
    //dữ liệu trả về
    $row = mysql_fetch_assoc($query);
    
    return ($row['total']>0) ? true : false;
}
/**
 * Lấy danh sách các mặt hàng được khuyến mãi theo một đợt
 * @param int
 * @return array list
 */
function get_products_of_promotion($pid) {
    $sql = "SELECT
                product.THUMB,
                product.NAME_PRO,
                details_promotion.ID_PRO,
                details_promotion.ID,
                details_promotion.PRICE_OFF
                FROM
                details_promotion
                INNER JOIN product ON details_promotion.ID_PRO = product.ID
                WHERE
                details_promotion.ID_PROMOTION = ".$pid."
                ORDER BY
                product.NAME_PRO ASC
                ";
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
 * lấy khuyến mãi hiện tại của sản phẩm
 * @param int
 * @return array list
 */
function get_product_have_promotion($pid,$timeorder) {
    $sql = "SELECT
            details_promotion.ID,
            details_promotion.ID_PROMOTION,
            details_promotion.PRICE_OFF
            FROM
            details_promotion
            INNER JOIN promotions ON details_promotion.ID_PROMOTION = promotions.ID
            WHERE 
            '".$timeorder."' BETWEEN promotions.TIME_START AND  promotions.TIME_END AND
            details_promotion.ID_PRO =".$pid;
    $query = mysql_query($sql) or die(mysql_error());
    //dữ liệu trả về
    $data = array();
    if (mysql_num_rows($query) > 0) {
        $data = mysql_fetch_assoc($query);
        mysql_free_result($query);
    }
    return $data;
}
