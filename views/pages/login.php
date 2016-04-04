<?php 
	$title = 'Login';
	require VIEW_DIR . '/header.php'; 
?>
	<!-- Login form that send the user to the images page-->
	<div id="login_div">
		<h1>Login</h1>
		<form id="login_form">
			<label>Username:<input type="text" id="loginName"/></label>
			<label>Password:<input type="password" id="loginPassword"/></label>
			<button type="button" onClick="javascript:Validate()">Login</button>
			<p id="loginText" class="login_text"></p>
		</form>
	</div>
    <script>
		function Validate(){
			var name = document.getElementById("loginName").value;
			var pw = document.getElementById("loginPassword").value;
			
			var request = new XMLHttpRequest();
			request.open("POST", "/validate", true);
			request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			request.send(JSON.stringify({"username":name, "password":pw}));	
			
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					if(JSON.parse(request.responseText).value){
						location.replace("/images");
					}
					else{
						document.getElementById("loginText").innerHTML = "Incorrect password";
					}
				}
			}
		}
	</script>
 
<?php
	require VIEW_DIR . '/footer.php'; 
?>