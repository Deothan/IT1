<?php
	$title = 'Images'; 
	require VIEW_DIR . '/header.php';

	use \App\Controller\ImageController;
	$imagecontroller = New ImageController();
?>
<h1>Images</h1>
<div id="image_div">
	<?php
	$content = $imagecontroller->GetImages();
	$json = json_decode($content, true);
	foreach($json as $value){
		if($value['user_id'] == $_SESSION['userid']){
			echo $value['name'];
		}
	}?>
</div>
    <form id="upload_button" method="post" action="/showUpload">
		<button>Upload</button>
   	</form>	
    
<?php 
	require VIEW_DIR . '/footer.php';
?>

