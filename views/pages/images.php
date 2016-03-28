<?php 
	$title = 'Images'; 
	require VIEW_DIR . '/header.php';
 ?>
	<h1> Images </h1>
    
    <!-- First picture -->
    <p> Vildsvin </p>
    <img id="image_page_vildsvin" src="/../../public/Images/Vildsvin.jpg" />
    
    <!-- Second image -->
    <p> Giraf </p>
    <img id="image_page_giraf" src="/../../public/Images/Giraf.jpg" />
    
    <!-- Third image -->
    <p> Aber </p>
    <img id="image_page_aber" src="/../../public/Images/Aber.jpg" />
    
    <!-- Fourth image -->
    <p> Bavian </p>
    <img id="image_page_bavian" src="/../../public/Images/Bavian.jpg" />
    <br>
    
    <form id="upload_button" method="post" action="/showUpload">
		<button> Upload </button>
   	</form>	
    
<?php 
	require VIEW_DIR . '/footer.php';
?>
