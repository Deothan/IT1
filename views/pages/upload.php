<?php require VIEW_DIR . '/header.php'; ?>
<?php $title = 'Upload'; ?>

	<form id="upload_form">
    	<ul>
        	<li><label><input type="text" id="name"></input></label></li>
        	<li><input type="file" id="fileToUpload"></input></li>
            <li><button type="button" onClick="javascript:Upload()">Upload</button></li>
        </ul>
    </form>
    
    <p id="output">test</p>
    
    <script>
		function Upload(){
			var path = document.getElementById("fileToUpload").value;
			var name = document.getElementById("name").value;
			
			var request = new XMLHttpRequest();
			request.open("POST", "/upload", true);
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(JSON.stringify({"path":path, "name":name}));	
			
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					if(JSON.parse(request.responseText).value){
						location.replace("/login");
					}
					else{
							document.getElementById("output").innerHTML = "Incorrect password";
					}
				}
			}
		}
	</script>
    
<?php require VIEW_DIR . '/footer.php'; ?>
