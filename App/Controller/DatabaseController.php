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

        $stmt = $this->conn->prepare('SELECT id FROM users WHERE username = :username AND password = :password');
        $stmt->bindParam(':username', $data["username"], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
        //Prepare statement with htmlentities
		$name = htmlentities($_POST['name']);

        $stmt = $this->conn->prepare('UPDATE users SET username = :username, password = :password WHERE id= :id');
        $stmt->bindParam(':username', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function UploadImage(){
        //Fixed fileextension for now.. Only temp
        $fileext = "jpg";
        //Upload file function
        if(isset($_FILES['fileupload'])){
            if($_FILES['fileupload']['size'] > 2000000){
                echo "File to large";
            } else{
                //Temp file to move
                $file_tmp = $_FILES['fileupload']['tmp_name'];
                //htmlentities
                $imagename = htmlentities($_POST['imagename']);

                //Prepare statement
                $stmt = $this->conn->prepare('INSERT INTO images (name, user_id, type) VALUES (:name, :userid, :fileext)');
                $stmt->bindParam(':name', $imagename, PDO::PARAM_STR);
                $stmt->bindParam(':userid', $_POST['userid'], PDO::PARAM_STR);
                $stmt->bindParam('fileext', $fileext, PDO::PARAM_STR);
                $stmt->execute();

                //Get id that was just inserted, make it the name, call it a day
                $filename = $this->conn->lastInsertId();
                move_uploaded_file($file_tmp, "public/images/" .$filename .".jpg");
            }
        }

    }

    public function GetAllImages(){
        //Prepare statement
        $stmt = $this->conn->prepare('SELECT * FROM images');
        $stmt->execute();

        //Create array to contain all database records
        $dataArray = array();

        //Iterate through database content and put into dataarray
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $dataArray[] = $row;
        }

        //Encode into json and return
        return json_encode($dataArray);
    }

    public function DeleteImage(){
        //Prepare statement
        $stmt = $this->conn->prepare('DELETE FROM images WHERE id = :id');
        $stmt->bindParam(':id', $_POST['imageid'], PDO::PARAM_STR);
        $stmt->execute();

        //TODO unlink of image file.. Image file still exists
    }
}