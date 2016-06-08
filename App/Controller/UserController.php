<?php
namespace App\Controller;

use App\Model\User;

class UserController{
	private $user;

	public function __construct(){
		$this->user = new User();
	}

	public function Login(){
		$this->user->Login();
	}

	public function Logout(){
		$this->user->Logout();
	}

	public function ShowLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
	
	public function ShowUsers(){
		require VIEW_DIR . '/pages/users.php';
	}
	
	public function AddUser(){
		require VIEW_DIR . '/pages/addUsers.php';
	}

	public function OpenEditUser() {
		require VIEW_DIR . '/pages/editUser.php';
	}

	public function EditUser(){
		$this->user->EditUser();
		return $this->ShowUsers();
	}
}?>