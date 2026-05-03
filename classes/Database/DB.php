<?php
namespace App\Database;
use mysqli;

class DB{
    private string $username = 'root';
    private string $host = 'localhost';
    private  string $database = 'anime_land';
    private string $password = '';

    public mysqli $connection;

    public function __construct(){
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
    }
}