<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="../public/assets/css/main.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<title><?php if (isset($title)) { echo $title; } ?></title>
</head>
<body>
<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){?>
    <form id="users_button" method="post" action='/users'>
   		<button>Users</button>
    </form>
    <form id="images_button" method="post" action="/images">
   		<button>Images</button>
    </form>
    <form id="login_button" method="post" action="/logout">
   		<button>Logout</button>
    </form><br>
<?php } ?>