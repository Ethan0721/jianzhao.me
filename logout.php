<!-- <h2>dasas</h2>
 -->
<?php
	
	session_start();
	$_SESSION['alive'] ="NO";
	$_SESSION['message'] = "Hi There";
	$_SESSION['username'] = "";
	header('Location: index.php');
?>