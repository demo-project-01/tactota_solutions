<?php


require_once("../init.php");
class database
{


    private static $_instance;
    private $_connection;
    public static function getInstance() {

        if(!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        $this->_connection = new mysqli(host, username, password, dbname);


        if(mysqli_connect_error()) {
            printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
        }
    }



    public function getConnection() {
        return $this->_connection;
    }

}

