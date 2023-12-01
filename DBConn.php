<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'crud_oop');

class DatabaseConnection
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($this->conn->connect_error) {
            die("<h1>Database Connection Failed: " . $this->conn->connect_error . "</h1>");
        } else {
            //echo "Database Connected Successfully";
        }
    }
}

?>
