


<h1>Home aaa</h1>


<?php
		require_once './DatabaseAdaptor.php';
		session_start();			
		

		if( isset($_POST['comment-submit'])){
				$author = $_POST['author'];
				$comments= $_POST['comments'];
				$myDatabaseFunctions->add_message($comments,$author);
				// if($result){
				header('Location: index.php#services');
				// }else{
				// 	$_SESSION['message'] ="Something is wrong can't leave your message now";
				// 	header('Location: index.php');
				// }
		}

		if(isset($_POST['register'])){	
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$result = $myDatabaseFunctions->register_verify($username,$password,$email);
			if($result){
				$myDatabaseFunctions->insert_user($username,$password,$email);
				$_SESSION['message'] = 'WELCOME '.$username;
				$_SESSION['alive']="YES";
				$_SESSION['username'] = $username;
				header('Location: index.php');
		}
			else {
				$_SESSION['register_error'] =  'YES';
				header('Location: register.php');
			}
		}

		elseif(isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
		
			$result = $myDatabaseFunctions->login_verify($username,$password);
			if($result){
				$_SESSION['message'] = 'WELCOME '.$username;
				$_SESSION['alive']="YES";
				$_SESSION['username'] = $username;
				header('Location: index.php');
			}
			else {
				$_SESSION['login_error'] =  'YES';
				header('Location: login.php');
			}
		}

		


		elseif(  isset($_POST['action']) && isset($_POST['ID']) ){
				$action = $_POST['action'];
				$id = $_POST['ID'];
				if($action === 'increase' ){
					 // $myDatabaseFunctions->raiseRating($ID);
					$myDatabaseFunctions->raiseRating($id);
					header("Location: index.php#services");
				}

				if ($action ==='decrease'){
					$myDatabaseFunctions->lowerRating($id);
					header("Location: index.php#services");
				}

		}
?>
