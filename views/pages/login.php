<?php 
	$title = 'Login';
	require VIEW_DIR . '/header.php'; 
?>

<h1> Login </h1>
	<!-- Login form that send the user to the images page-->
	<form id="login_form">
    <ul>
		<li><label>Username:<input type="text" id="loginName"/></label></li>
       	<li><label>Password:<input type="password" id="loginPassword"/></label></li>
        <li><button type="button" onClick="javascript:Validate()">Login</button></li>
    </ul>	
    </form>
	<p id="loginText"></p>
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
						location.replace("/login");
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