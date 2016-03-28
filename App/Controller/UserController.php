<?php
namespace App\Controller;

class UserController{	
	public function __construct(){
	}
	
	public function ShowUsers(){
		require VIEW_DIR . '/pages/users.php';
	}
	
	public function AddUser(){
		require VIEW_DIR . '/pages/addUsers.php';
	}
}?>