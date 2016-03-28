<?php
namespace App\Controller;
use App\Model\LoginModel;

class LoginController{	
	public function __construct(){
	}
	
	public function Login(){
		$this->ShowLogin();
	}
	
	public function Logout(){
		$_SESSION["loggedIn"] = false;
		 header ('Location: /login');
	}
	
	public function ShowLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
}?>