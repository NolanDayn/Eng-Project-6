<?php
session_start();
require_once "config.php";

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	$result = "UPDATE credentials SET password = '$password', email = '$email' WHERE username = '$username'";
	$link->query($result);
	

	header("location: ../logbook.php");
}

$link->close();

?>