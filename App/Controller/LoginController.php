<?php
namespace App\Controller;

class LoginController{	
	public function __construct(){
	}
	
	public function Login(){
		$this->ShowLogin();
	}
	
	public function Logout(){
		session_destroy();
		header('Location: /login');
	}
	
	public function ShowLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
}?>