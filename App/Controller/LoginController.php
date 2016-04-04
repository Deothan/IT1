<?php
namespace App\Controller;
use PDO;

class LoginController{	
	public function __construct(){
	}
	
	public function Login(){
		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$dbuser = 'root';
		$dbpw = 'pw';
		$dbhost = 'localhost';
		$dbName = 'imagedb';
		
		try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
		catch ( PDOException $e) {die(); }
	
		$query = $connection->prepare('SELECT id FROM users WHERE username = :username AND password = :password');
		$query->bindParam(':username', $data["username"] , PDO::PARAM_STR);
		$query->bindParam(':password', $data["password"] , PDO::PARAM_STR);
		$query->execute();
		$row = $query->fetch(PDO::FETCH_ASSOC);
		if(!empty($row)){
			$_SESSION["loggedIn"] = true;
			$_SESSION["userid"] = $row['id'];
			echo json_encode(array('value' => true));
		}
		else{
			echo json_encode(array('value' => false));
		}
	}
	
	public function Logout(){
		session_destroy();
		header('Location: /login');
	}
	
	public function ShowLogin(){
		require VIEW_DIR . '/pages/login.php';
	}
}?>