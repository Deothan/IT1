<?php
namespace App\Controller;
use App\Model\ImageModel;

class ImageController{
	public function __construct(){
	}
	
	public function ShowImages(){
		require VIEW_DIR . '/pages/images.php';
	}
	
	public function UploadImage(){
		$input = file_get_contents('php://input');
		$data = json_decode($input, true);
		
		$file_content = file_get_contents($data["path"]);
		
		require CONTROLLER_DIR . '/UploadImage.php';
	}
	
	public function ShowUpload(){
		require VIEW_DIR . '/pages/upload.php';
	}
}?>