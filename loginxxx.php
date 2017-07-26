

<h3>Log in </h3>


<form action = "controller.php" method = "post">
Username &nbsp; <input type = "text" name = "username" required ><br>
Password &nbsp;	<input type = "password" name = "password" required><br>
<input type = "submit" name = "login" value ='login'><br>
</form>

<?php
	session_start();
	if( isset($_SESSION['login_error']) && $_SESSION['login_error'] ==="YES"){
		echo '<div id = login_error_filed> Sorry, username and password does not match.<div>';
		$_SESSION['login_error'] = "false";
	}

?>
