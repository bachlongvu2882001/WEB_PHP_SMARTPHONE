<?php

class database
{
    public $conn,
    $server = "127.0.0.1:3307",
    $user = "root",
    $pass = "",
    $DbName = "db_cars";

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->DbName);
        if (!$this->conn) {
            echo "connect failed";
        }
    }
}
