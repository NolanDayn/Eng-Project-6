<?php

$servername = "localhost:3306";
$username = "root";
$password = "password";
$dbname = "quizElevator";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = "UPDATE carNode SET floorNumber=? WHERE nodeID=1";
$stmt->bind_param("i", 2);
$stmt->execute();
$stmt->close();

$conn->close();

//header("location: members.php");

?>