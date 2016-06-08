<?php
/**
 * Created by PhpStorm.
 * User: Von Frank
 * Date: 07-06-2016
 * Time: 20:35
 */

namespace App\Model;

use App\Kernel\DatabaseConnection;
use PDO;

class Image
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->CreateConnection();
    }

    public function CreateImage(){
        $fileext = "jpg";

        $file_temp = $_FILES['fileupload']['tmp_name'];
        $handle = fopen($file_temp, "rb");
        $contents = stream_get_contents($handle);
        fclose($handle);

        $imagename = $_POST['imagename'];

        //Prepare statement
        $stmt = $this->conn->prepare('INSERT INTO images (name, file, user_id, type) VALUES (:name, :file, :userid, :fileext)');
        $stmt->bindParam(':name', $imagename, PDO::PARAM_STR);
        $stmt->bindParam(':file', $contents, PDO::PARAM_STR);
        $stmt->bindParam(':userid', $_POST['userid'], PDO::PARAM_STR);
        $stmt->bindParam(':fileext', $fileext, PDO::PARAM_STR);
        $stmt->execute();

        //Fixed fileextension for now.. Only temp
        /*$fileext = "jpg";
        //Upload file function
        if(isset($_FILES['fileupload'])){
            if($_FILES['fileupload']['size'] > 2000000){
                echo "File to large";
            } else{
                //Temp file to move

                $file_tmp = $_FILES['fileupload']['tmp_name'];
                $imagename = $_POST['imagename'];

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
        }*/
    }

    public function GetAllImages(){
        //Prepare statement
        $stmt = $this->conn->prepare('SELECT * FROM images');
        $stmt->execute();

        //Create array to contain all database records
        $dataArray = array();
        $position = 0;

        //Iterate through database content and put into dataarray
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $dataArray = $row;
            //$dataArray[$position] = array('id' => $row['id'], 'name' => $row['name'], 'user_id' => $row['user_id'], 'type' => $row['type']);
            //$position = $position + 1;
        }

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