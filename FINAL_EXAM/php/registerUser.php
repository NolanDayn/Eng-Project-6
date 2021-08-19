<?php
require_once "config.php";

$login_err = "";
$user = $_POST["username"];
$pass = $_POST["password"];
$email = $_POST["email"];


if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	//$result = $mysqli->query("SELECT * FROM credentials WHERE username = '$user'");
	
	//if($result->num_rows == 0) {	
     	$query = "INSERT INTO credentials(username, password, email) VALUES ('$user', '$pass', '$email')";
		$link->query($query);	
	//} else {
		//$login_err = "user already exists";
	//}

	header("location: ../register.php?error=$login_err");
}

$link->close();

?>