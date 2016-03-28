<?php
namespace App\Controller;

class ValidateLogin{
	private $password;
	private $username;
	
	public function __construct(){
	}
	
	public function ValidateLogin(){
		$input = file_get_contents('php://input');
		$data = json_decode($input, true);
		
		$this->username = $data["username"];
		$this->password = $data["password"];
		
		$this->checkDB($this->username, $this->password);
	}
	
	public function checkDB($name, $pw){
		require CONTROLLER_DIR . '/CheckForUser.php';
	}	
}
?>