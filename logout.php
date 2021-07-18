<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session.
	session_destroy();

	// Redirect to login page
	header("location: index.php");
	exit;
}
?>