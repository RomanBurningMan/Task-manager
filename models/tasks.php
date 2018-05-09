<?php

namespace App;

use PDO;

class Tasks
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getList()
    {
        $sql = "
            SELECT
              user_name,
              email,
              task,
              img
            FROM
              tasks as t1
            LEFT JOIN
              users as t2
              ON
                t1.user_id = t2.id;
        ";

        $result = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addTask($arguments)
    {
        $userName    = htmlentities($arguments['userName']);
        $email       = htmlentities($arguments['email']);
        $description = htmlentities($arguments['task']);

        $this->connection->prepare("
            INSERT INTO
              users
              
        ");
    }
}