<?php
include 'configuration.php';
class workwithdb {

    public $app = null;

    public function CreateConnection() {
        try {
            $this->app = new PDO('mysql:host=' . configuration::CONFIG_HOST_NAME . ';dbname=' . configuration::CONFIG_DATABASE, configuration::CONFIG_USERNAME, configuration::CONFIG_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"]);
            $this->app->exec("SET time_zone = '{" . configuration::CONFIG_TIME_ZONE . "'");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function CloseConnection() {
        $this->app = null;
    }

}
