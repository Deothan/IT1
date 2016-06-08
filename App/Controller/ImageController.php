<?php
namespace App\Controller;

use App\Model\Image;

class ImageController{
	private $imageModel;

	public function __construct(){
		$this->imageModel = new Image();
	}
	
	public function ShowImages(){
		require VIEW_DIR . '/pages/images.php';
	}
	
	public function UploadImage(){
		$this->imageModel->CreateImage();
		return $this->ShowImages();
	}
	
	public function ShowUpload(){
		require VIEW_DIR . '/pages/upload.php';
	}

	public function GetImage(){
		return $this->imageModel->GetImage(1);
	}
	
	public function GetImages(){
<<<<<<< HEAD
		return $this->imageModel->GetAllImages();
=======
		return $this->dbcontroller->GetAllImages();
>>>>>>> ac878f488acd43dfbbf2d14698a6887fb721916d
	}

	public function DeleteImage(){
		$this->imageModel->DeleteImage();
		return $this->ShowImages();
	}
}?>