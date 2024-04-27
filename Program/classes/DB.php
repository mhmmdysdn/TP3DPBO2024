<?php

class DB
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    private $result;

    function __construct($hostname, $username, $password, $dbname)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    function open()
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }

    function execute($query)
    {
        $this->result = mysqli_query($this->conn, $query);
        return $this->result;
    }

    function getResult()
    {
        return mysqli_fetch_array($this->result);
    }

    function executeAffected($query = "")
    {
        // mengeksekusi query
        $this->result = mysqli_query($this->conn, $query);
        // mengembalikan nilai affected rows
        return mysqli_affected_rows($this->conn);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}
