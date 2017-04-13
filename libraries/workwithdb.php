<?php
class workwithdb {

    public $app = null;

    public function CreateConnection() {
        try {
           $configs = read_configuration_info(); 
           $this->app = new PDO('mysql:host=' . $configs[1] . ';dbname=' . $configs[4], $configs[2],$configs[3], [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"]);
            $this->app->exec("SET time_zone = '{" . $configs[0] . "'");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function CloseConnection() {
        $this->app = null;
    }

}
