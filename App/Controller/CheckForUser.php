<?php
	$dbuser = 'root';
	$dbpw = 'pw';
	$dbhost = 'localhost';
	$dbName = 'imagedb';
	
	try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
	catch ( PDOException $e) {die(); }

	$result = $connection->query('SELECT id FROM users WHERE username="'.$name.'" && password ="'.$pw.'";');
	$result->setFetchMode(PDO::FETCH_ASSOC);
	$row = $result->fetch();
	if(!empty($row)){
		$_SESSION["loggedIn"] = true;
		$_SESSION["userid"] = $row['id'];
		echo json_encode(array('value' => true));
	}
?>