<?php

/**
 * Thao tác kết nối và hủy kết nối CSDL
 * @author Chuột
 * @modified 05/07/2014
 */
class workwithdb {

    /**
     * Tạo kết nối
     * @return void
     */
    public function CreateConnection() {
        define('CONFIG_TIME_ZONE', 'Asia/Ho_Chi_Minh');
        define('CONFIG_HOST_NAME', 'localhost');
        define('CONFIG_USERNAME', 'root');
        define('CONFIG_PASSWORD', '');
        define('CONFIG_DATABASE', 'avalon');
//        define('CONFIG_HOST_NAME', 'sql309.0fees.us');
//        define('CONFIG_USERNAME', '0fe_15031904');
//        define('CONFIG_PASSWORD', '1675349');
//        define('CONFIG_DATABASE', '0fe_15031904_avalon');
       // define('BASEURL' , 'http://localhost/myshop/');
       // define('BASEPATH', './');
        
        date_default_timezone_set(CONFIG_TIME_ZONE);
        $conn = mysql_connect(CONFIG_HOST_NAME, CONFIG_USERNAME, CONFIG_PASSWORD)or die("kết nối thất bại");
        mysql_select_db(CONFIG_DATABASE, $conn) or die("Không tìm thấy csdl");
        mysql_query("set names 'utf8'", $conn);
    }

    /**
     * Đóng kết nối
     * @return void
     */
    public function CloseConnection() {
        mysql_close();
    }

}
