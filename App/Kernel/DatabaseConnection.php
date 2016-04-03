<?php
/**
 * Created by PhpStorm.
 * User: Von Frank
 * Date: 03-04-2016
 * Time: 10:39
 */

namespace App\Kernel;
use PDO;


class DatabaseConnection
{
    private $dbHost, $dbUsername, $dbPassword, $dbName, $conn;

    public function __construct(){
        $this->dbHost = "localhost";
        $this->dbUsername = "root";
        $this->dbPassword = "pw";
        $this->dbName = "imagedb";
    }

    public function CreateConnection(){
        try {
            $this->conn = new PDO('mysql:host='.$this->dbHost.';dbname=' . $this->dbName, $this->dbUsername, $this->dbPassword);
            return $this->conn;
        }
        catch (PDOException $e) {
            die();
        }
    }
}