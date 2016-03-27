<?php
namespace App\Controller;
use App\Model\LoginModel;

class LoginController{
	private $loginModel = null;
	
	public function __construct(LoginModel $loginModel){
		$this->loginModel = $loginModel;
	}
	
	public function Login(){
		$this->loginModel->setLoggedIn(true);
		$this->showLogin();
	}
	
	public function showLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
}?>