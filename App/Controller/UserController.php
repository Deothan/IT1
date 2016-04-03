<?php
namespace App\Controller;

class UserController{
	private $dbcontroller;

	public function __construct(){
		$this->dbcontroller = new DatabaseController();
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
		$this->dbcontroller->EditUser();
		return $this->ShowUsers();
	}
}?>