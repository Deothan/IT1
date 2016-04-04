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
		foreach($json as $value){?>
			<?php if($value['user_id'] == $_SESSION['userid']){ ?>
			<h2><?php echo $value['name']; ?></h2> 
			<form id="delete_image" method="post" action="/deleteimage">
				<button>Delete image</button>
				<input type="hidden" name="imageid" value="<?php echo $value['id']; ?>">
			</form>
			<img src="/public/images/<?php echo $value['id']; ?>.<?php echo $value['type']; ?>" id="image_page">
		<?php }; }
	?>
</div>
    
    <form id="upload_button" method="post" action="/showUpload">
		<button>Upload</button>
   	</form>	
    
<?php 
	require VIEW_DIR . '/footer.php';
?>

