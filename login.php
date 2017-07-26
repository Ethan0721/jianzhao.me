 <link href="css/loginRegister.css" rel="stylesheet">




<div class="login">
	<h1>Login</h1>
    <form  action = "controller.php" method="post">
    	<input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name = "login" value = 'login' class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>


<!-- <form action = "controller.php" method = "post">
	Username &nbsp; <input type = "text" name = "username" required ><br>
	Password &nbsp;	<input type = "password" name = "password" required><br>
<input type = "submit" name = "login" value ='login'><br>
</form> -->



<?php
	session_start();
	if( isset($_SESSION['login_error']) && $_SESSION['login_error'] ==="YES"){
		echo '<div id = login_error_filed> Sorry, username and password does not match.<div>';
		$_SESSION['login_error'] = "false";
	}

?>
