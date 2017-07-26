
<link href="css/main.css" rel="stylesheet">

<h3>Create account</h3>

<form id = "register_form" action = "controller.php" method = "post">
	Username &nbsp; <input type = "text" name = "username" required ><br><br>
	Email &ensp;&ensp;&ensp;	<input type = "email" name = "email" required><br><br>
	Password &nbsp;	<input type = "password" name = "password" required><br><br>
<!-- ReEnter password &nbsp;	<input type = "password" name = "password2" required><br>
 -->
	<input type = "submit" name = "register" value ='Register'><br><br>
</form>

<?php
	
	session_start();
	if( isset($_SESSION['register_error']) && $_SESSION['register_error'] ==="YES"){
		echo '<div id = register_error_filed> Sorry, username has been used.<div>';
		$_SESSION['register_error']="false";
	}

?>