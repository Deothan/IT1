<?php require VIEW_DIR . '/header.php'; ?>
<?php $title = 'Upload'; ?>

	<form id="upload_form">
    	<ul>
        	<li><input type="file" id="fileToUpload"> </label></li>
            <li><button onClick="javascript:Upload()">Upload</button></li>
        </ul>
    </form>
    
    <script>
		function Upload(){
			var path = document.getElementById("fileToUpload").value;
			
			var request = new XMLHttpRequest();
			request.open("POST", "/upload", true);
			request.setRequestHeader("Content-Type", "application:json;charset=UTF-8");
			request.send(JSON.stringify({"path":path}));	
			
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//var response = JSON.parse(request.responseText);
					var response = JSON.parse('{"value":true}');
					if(response.value){
						location.replace("/images");
					}
				}
			}	
		}
	</script>
    
<?php require VIEW_DIR . '/footer.php'; ?>
