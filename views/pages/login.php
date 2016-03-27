<?php 
$title = 'Login';
require VIEW_DIR . '/header.php'; 

	if(isset($_POST["loginName"]) && isset($_POST["loginPassword"])){
		$result = $connection->query('SELECT username, password FROM users');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $result->fetch()){
			if($row['username'] == $_POST["loginName"] && $row['password'] == $_POST["loginPassword"]){
				$_SESSION["loggedIn"] = true;
			}
		}
	}
?>

<h1> Login </h1>
	<!-- Login form that send the user to the images page-->
	<form id="login_form" method="post" <?php if(isset($_SESSION['loggedIn']) &&$_SESSION["loggedIn"] == true){ ?> action="/images"><?php } else { ?> action="/"> <?php } ?>
    <ul>
		<li><label>Username:<input type="text" name="loginName"/></label></li>
       	<li><label>Password:<input type="password" name="loginPassword"/></label></li>
        <li><button>Login</button></li>
    </ul>	
    </form>
 
<?php
	require VIEW_DIR . '/footer.php'; 
?>