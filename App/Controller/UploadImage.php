<?php
	$dbuser = 'root';
	$dbpw = 'pw';
	$dbhost = 'localhost';
	$dbName = 'imagedb';
	
	try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
	catch ( PDOException $e) {die(); }

	$result = $connection->query('Insert into images (name, picture, user) values ');
	$result->setFetchMode(PDO::FETCH_ASSOC);
	if(!empty($result->fetch())){
		echo json_encode(array('value' => true));
	}
?>