<?php
session_start();
require_once "config.php";

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	$query = "";
	if ($email == "") {
		$query = "UPDATE credentials SET password = '$password' WHERE username = '$username'";
	} else if ($password == "") {
		$query = "UPDATE credentials SET email = '$email' WHERE username = '$username'";
	} else{
		$query = "UPDATE credentials SET password = '$password', email = '$email' WHERE username = '$username'";
	}
	$link->query($query);
	

	header("location: ../logbook.php");
}

$link->close();

?>