<?php

class UA_Database
{
    protected $host = 'localhost';
    protected $root = 'pengumuman';
    protected $password = 'p3n9umum4n';
    protected $database = 'pengumumanppdb';
    protected $conn = null;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->root, $this->password, $this->database);
        if (!$this->conn) {
            echo ("Koneksi database error! => " . $this->conn->connect_error);
        }
    }


    public function connection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
