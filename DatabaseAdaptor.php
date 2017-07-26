<?php
class DatabaseAdaptor {
	private $DB; 
	public function __construct() {
		$db = 'mysql:dbname=zhao_web;host=localhost';
		// $user = 'vizard';
		// $password ='ethan123';
		$user = 'root';
		$password ='';
	try {
		$this->DB = new PDO ( $db, $user, $password );
		$this->DB->setAttribute ( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	} catch ( PDOException $e ) {
		echo ('Error establishing Connection');
		exit ();
	}

} 

	public function register_verify($username,$password,$email){
		 $stmt = $this->DB->prepare("SELECT count(*) as number_of_users FROM users where username = :username");
		 $stmt->bindParam('username',$username);
		 $stmt->execute();	
		 $arr = $stmt->fetchAll(PDO:: FETCH_ASSOC);
		 $num = $arr[0]['number_of_users'];
		 if($num>0)
		 	return false;
		 // hash the password 
		 else {  
		 	return true;
		 }
	}
		public function insert_user($username,$password,$email){
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->DB->prepare("INSERT INTO users (username, password, email, register_date) VALUES (:username, :password, :email, now())");
		$stmt->bindParam('username',$username);
		//$stmt->bindParam('hash',$hash);
		$stmt->bindParam('password',$password);
		$stmt->bindParam('email',$email);
		$stmt->execute();
		//$stmt->execute(array($username, $password,$email));
		// header('Location: login.php');
}

	public function login_verify($username,$password){
		// $hash = password_hash($password, PASSWORD_DEFAULT);
 		$stmt = $this->DB->prepare("SELECT password FROM users WHERE username = :username");
		$stmt->bindParam('username',$username);
		$stmt->execute();
 		$arr = $stmt->fetch(PDO::FETCH_COLUMN);
 		// $match = password_verify($password,$arr);
 		if($password==$arr)
 			return true;
 		else return false;
	}

	public function add_message($message,$username){
		$stmt = $this->DB->prepare("INSERT INTO messages (added, message, username, liked, disliked, flagged) values (now(), :message, :username,0, 0, 'f')");
		$stmt->bindParam('message', $message);
		$stmt->bindParam('username', $username);
		if($stmt->execute())
			return true;
		else return false;
	}

	public function getQuotesAsArray(){
		$stmt = $this->DB->prepare(" SELECT * FROM messages Where flagged = 'f' ORDER BY liked DESC , id DESC ");
		$stmt ->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function raiseRating($id){
		// header("Location : ".$ID.".php");

		$stmt = $this->DB->prepare(" UPDATE messages SET liked = liked + 1 WHERE id=:id");
		$stmt->bindParam('id', $id);
		$stmt->execute();
	}

	public function lowerRating($id){
		$stmt = $this->DB->prepare("UPDATE messages SET disliked = disliked +1  WHERE id = :id");
		$stmt->bindParam('id', $id);
		$stmt->execute();
	}

}
		$myDatabaseFunctions = new DatabaseAdaptor();
?>