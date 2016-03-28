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
    
    <script>
		function Validate(){
			var name = document.getElementById("loginName").value;
			var pw = document.getElementById("loginPassword").value;
			
			var request = new XMLHttpRequest();
			request.open("POST", "/validate", true);
			request.setRequestHeader("Content-Type", "application:json;charset=UTF-8");
			request.send(JSON.stringify({"username":name, "password":pw}));	
			
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					//var response = JSON.parse(request.responseText);
					var response = JSON.parse('{"value":true}');
					if(response.value){
						location.replace("/login");
					}
				}
			}
		}
	</script>
 
<?php
	require VIEW_DIR . '/footer.php'; 
?>