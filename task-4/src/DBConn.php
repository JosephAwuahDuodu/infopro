<?php

class DBConn {
    private string $err_message;

    private string $servername = "localhost"; 
    private string $username = "joseph"; 
    private string $password = "";
    private $conn;

    public function __construct() 
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);

        // Check connection
        if (!$this->conn) {
            $this->err_message['db_connect_error'] = mysqli_connect_error();
            die($this->err_message['db_connect_error']);
        }
        return true;
    }

    public function get_db_connection()
    {
        return $this->conn;
    }

    public function close_db_conn()
    {
        return $this->conn->close();
    }


}