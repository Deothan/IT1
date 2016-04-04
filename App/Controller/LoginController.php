<?php
namespace App\Controller;

class LoginController{
	private $dbController;

	public function __construct(){
		$this->dbController = new DatabaseController();
	}
	
	public function Login(){
		$this->dbController->Login();
	}
	
	public function Logout(){
		session_destroy();
		header('Location: /login');
	}
	
	public function ShowLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
}?>