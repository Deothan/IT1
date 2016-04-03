<?php
$title = 'Edit User';
require VIEW_DIR . '/header.php';
?>

<br><form id="add_user" method="post" action="/editUser">
    <ul>
        <li><label>Name:<input type="text" name="name" /> </label></li>
        <li><label>Password:<input type="password" name="password"/> </label></li>
        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="id">
        <li><button>Update user</button></li>
    </ul>
</form>

<?php
require VIEW_DIR . '/footer.php';
?>
