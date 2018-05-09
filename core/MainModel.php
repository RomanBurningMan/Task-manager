<?php
/**
 * Created by PhpStorm.
 * User: пользователь
 * Date: 29.11.2017
 * Time: 23:40
 */

namespace App;

use PDO;
use PDOException;

class MainModel
{
    private $_connection;
    private static $_instance;
    private $_host = "localhost";
    private $_user = "root";
    private $_password = "root";
    private $_database = "task_manager";

    public static function getInstance() {
        // если нет ни одного соединения с базой
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        try {
            $this->_connection = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database, $this->_user, $this->_password);
            $this->_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            file_put_contents(__DIR__.'/../log/PDOErrors.txt',date("Y-m-d H-i ").$e->getMessage()."\r\n",FILE_APPEND);
        }
    }
    // предотвращаем повторное создание соединения с базой данных
    private function __clone() { }

    // метод для работы с базой данных
    public function getConnection() {
        return $this->_connection;
    }
}