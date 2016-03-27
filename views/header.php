<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="../public/assets/css/main.css" rel="stylesheet" type="text/css" />
<title><?php if (isset($title)) { echo $title; } ?></title>

<?php
$dbuser = 'root';
$dbpw = 'pw';
$dbhost = 'localhost';
$dbName = 'imagedb';

try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
catch ( PDOException $e) {die(); }
?>

</head>
<body>
<?php 
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
    echo "<form id='users_button' method='post' action='/users.html'>";
   	echo	"<button> Users </button>";
    echo"</form>";
    echo"<form id='login_button' method='post' action='/images'>";
   	echo	"<button> Images </button>";
    echo"</form>";
    echo"<form id='login_button' method='post' action='/'>";
   	echo	"<button> Login </button>";
    echo"</form><br>";
} ?>