<?php
require_once "config.php";

$login_err = "";
$user = $_GET["username"];
$pass = $_GET["password"];
$email = $_GET["email"];


if($_SERVER["REQUEST_METHOD"] == "GET"){ 
	
	$query = "INSERT INTO credentials(username, password, email) VALUES ($user, $pass, $email)";
    $link->query($query);

	header("location: ../register.php?error=$login_err");
}



?>