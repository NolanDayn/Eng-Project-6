<?php
require_once "config.php";

$login_err = "";
$user = $_POST["username"];
$pass = $_POST["password"];
$email = $_POST["email"];


if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	$query = "INSERT INTO credentials(username, password, email) VALUES ('blah', 'blah', 'blah')";
    $link->query($query);

	//header("location: ../register.php?error=$login_err");
}

$link->close();

?>