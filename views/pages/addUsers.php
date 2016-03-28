<?php 
	$title = 'Add User';
	require VIEW_DIR . '/header.php';
?>

    <br><form id="add_user" method="post" action="/users">
    	<ul>
        	<li><label>Name:<input type="text" name="newName" /> </label></li>
            <li><label>Password:<input type="password" name="newPw"/> </label></li>
            <li><button>Create user</button></li>
        </ul>
    </form>
    
<?php 
	require VIEW_DIR . '/footer.php'; 
?>
