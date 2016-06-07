<?php
namespace App\Controller;

class ImageController{
	private $dbcontroller;

	public function __construct(){
		$this->dbcontroller = new DatabaseController();
	}
	
	public function ShowImages(){
		require VIEW_DIR . '/pages/images.php';
	}
	
	public function UploadImage(){
		$this->dbcontroller->UploadImage();
		return $this->ShowImages();
	}
	
	public function ShowUpload(){
		require VIEW_DIR . '/pages/upload.php';
	}
	
	public function GetImages(){
		return $this->dbcontroller->GetAllImages();
	}

	public function DeleteImage(){
		$this->dbcontroller->DeleteImage();
		return $this->ShowImages();
	}
}?>