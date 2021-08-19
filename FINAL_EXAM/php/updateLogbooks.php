<?php
session_start();
require_once "config.php";

$contents = $_POST["text"];
$username = $_SESSION["username"];
$id = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	$result = mysqli_query($link, "SELECT * FROM credentials WHERE username = '$username'");
	while($row = mysqli_fetch_assoc($result))
		{
			$id = $row['id'];
		}
	
    $query = "INSERT INTO logbookEntries(id, date, time, text) VALUES ('$id', 'CURDATE()', 'CURTIME()', '$contents')";
	$link->query($query);	

	header("location: ../logbook.php");
}

$link->close();

?>