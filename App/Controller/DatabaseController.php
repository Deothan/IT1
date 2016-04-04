<?php
/**
 * Created by PhpStorm.
 * User: Von Frank
 * Date: 03-04-2016
 * Time: 01:17
 */

namespace App\Controller;
use App\Kernel\DatabaseConnection;
use PDO;

class DatabaseController
{
    private $conn;

    public function __construct(){
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->CreateConnection();
    }

    public function Login(){
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $query = $this->conn->prepare('SELECT id FROM users WHERE username = :username AND password = :password');
        $query->bindParam(':username', $data["username"] , PDO::PARAM_STR);
        $query->bindParam(':password', $data["password"] , PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)){
            $_SESSION["loggedIn"] = true;
            $_SESSION["userid"] = $row['id'];
            echo json_encode(array('value' => true));
        }
        else{
            echo json_encode(array('value' => false));
        }
    }

    public function EditUser(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $userSql = "UPDATE users SET username='$name', password='$password' WHERE id='$id'";
        if($this->conn->query($userSql) == true){} else{
            echo "Error updating record";
        }
    }

    public function UploadImage(){
        $name = $_POST['imagename'];
        $userid = $_POST['userid'];

        if(isset($_FILES['fileupload'])){
            $file_tmp = $_FILES['fileupload']['tmp_name'];

            $imageSql = "INSERT INTO images (name, user_id, type) VALUES ('$name', '$userid', 'jpg')";
            if ($this->conn->query($imageSql) == true) {} else {
                echo "Error uploading image";
            }
            $filename = $this->conn->lastInsertId();
            move_uploaded_file($file_tmp, "public/images/" .$filename .".jpg");
        }

    }

    public function GetAllImages(){
        //Get all records from database
        $imageSql = "SELECT * FROM images";
        $result = $this->conn->query($imageSql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        //Create array to contain all database records
        $dataArray = array();

        //Iterate through database content and put into dataarray
        while($row = $result->fetch()){
            $dataArray[] = $row;
        }

        //Encode into json and return
        return json_encode($dataArray);
    }

    public function DeleteImage(){
        //POST variables
        $id = $_POST['imageid'];
        //Delete record in database
        $imageSql = "DELETE FROM images WHERE id='$id'";
        if($this->conn->query($imageSql) == true){} else{
            echo "Error updating record";
        }
    }
}