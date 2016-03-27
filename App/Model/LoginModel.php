<?php 
namespace App\Model;

class LoginModel{
	private $loggedIn  = false;
	
	public function getLoggedIn(){
		return $this->loggedIn;	
	}
	
	public function setLoggedIn($loggedIn){
		$this->loggedIn = $loggedIn;	
	}
}?>