<?php require VIEW_DIR . '/header.php'; ?>
<?php $title = 'Upload'; ?>

	<form id="upload_form" method="post" enctype="multipart/form-data" action="/upload">
    	<ul>
        	<li><label><input type="text" name="imagename"></label></li>
        	<li><input type="file" name="fileupload"></li>
			<input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
            <li><button type="submit">Upload</button></li>
        </ul>
    </form>
    
<?php require VIEW_DIR . '/footer.php'; ?>
