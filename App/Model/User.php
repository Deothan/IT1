<?php

/**
 * Created by PhpStorm.
 * User: Von Frank
 * Date: 07-06-2016
 * Time: 20:10
 */

namespace App\Model;

use App\Kernel\DatabaseConnection;
use PDO;

class User
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->CreateConnection();
    }

    public function Login(){
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $stmt = $this->conn->prepare('SELECT id, password FROM users WHERE username = :username');
        $stmt->bindParam(':username', $data["username"], PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)){
            if(password_verify($data["password"], $row['password'])){
                $_SESSION["loggedIn"] = true;
                $_SESSION["userid"] = $row['id'];
                echo json_encode(array('value' => true));
            }
            else{
                echo json_encode(array('value' => false));
            }
        }
        else{
            echo json_encode(array('value' => false));
        }
    }

    public function Logout(){
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function EditUser(){
        //Prepare statement with htmlentities
        $name = htmlentities($_POST['name']);

        $stmt = $this->conn->prepare('UPDATE users SET username = :username, password = :password WHERE id= :id');
        $stmt->bindParam(':username', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt->execute();
    }
}