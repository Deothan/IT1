<?php 
	$title = 'Users';
	require VIEW_DIR . '/header.php'; 
	
	$dbuser = 'root';
	$dbpw = 'pw';
	$dbhost = 'localhost';
	$dbName = 'imagedb';
	
	$found = "failure";
	
	try { $connection = new PDO('mysql:host='.$dbhost.';dbname=' . $dbName, $dbuser, $dbpw); } 
	catch ( PDOException $e) {die(); }
	
	if(isset($_POST["newName"]) && isset($_POST["newPw"])){
		$query = $connection->prepare("INSERT INTO users (username, password) value (:name, :password)");
		$query->bindParam(':name', $name);
		$query->bindParam(':password', $password);
		$name = $_POST["newName"];
		$password = $_POST["newPw"];
		$query->execute();
	}
?>

    <br><table>
    	<tr>
    		<th>Id:</th>
            <th>username:</th>
        </tr>
        <tr>
            <?php
                $result = $connection->query('SELECT id, username FROM users');
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while($row = $result->fetch()){ ?>
                    <th> <?php echo $row['id' ]?> </th>
                    <th> <?php echo $row['username'] ?> </th> 
       	</tr> <?php } ?>		
    </table>
    
    <br><form id="add_user_button" method="post" action="/addUser">
    	<button>Create User</button>
    </form>
    
<?php require VIEW_DIR . '/footer.php'; ?>
