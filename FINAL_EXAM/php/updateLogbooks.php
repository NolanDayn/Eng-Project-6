<?php
session_start();
require_once "config.php";

$email = $_POST["email"];
$username = $_SESSION["username"];
$id;

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	$result = mysqli_query($link, "SELECT * FROM credentials WHERE username = '$username'");
	while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['id'];
		}
	
	$date = date("Y/m/d");
	$time = time();
    $query = "INSERT INTO logbookEntries(id, date, time, text) VALUES ('$id', '$date', '$time', $email)";
	$link->query($query);	

	header("location: ../logbook.php");
}

$link->close();

?>