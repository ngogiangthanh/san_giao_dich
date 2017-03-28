<?php

class workwithdb {

    public $app = null;

    public function CreateConnection() {
        define('CONFIG_TIME_ZONE', 'Asia/Ho_Chi_Minh');
        define('CONFIG_HOST_NAME', 'localhost');
        define('CONFIG_USERNAME', 'root');
        define('CONFIG_PASSWORD', '');
        define('CONFIG_DATABASE', 'san_giao_dich');

        try {
            $this->app = new PDO('mysql:host=' . CONFIG_HOST_NAME . ';dbname=' . CONFIG_DATABASE, CONFIG_USERNAME, CONFIG_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"]);
            $this->app->exec("SET time_zone = '{" . CONFIG_TIME_ZONE . "'");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function CloseConnection() {
        $this->app = null;
    }

}
