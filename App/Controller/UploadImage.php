<?php
	$dbuser = 'root';
	$dbpw = 'pw';
	$dbhost = 'localhost';
	$dbName = 'imagedb';
	
	try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
	catch ( PDOException $e) {die(); }

	$query = $connection->prepare("INSERT INTO images (name, file, user) values (:name, :file :user)");
	$query->bindParam(':name', $name);
	$query->bindParam(':file', $file);
	$query->bindParam(':user', $_SESSION["userid"]);
	$query->execute();
	
	echo json_encode(array('value' => true));
?>