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

$sql = "UPDATE carNode SET floorNumber={$_POST['floor']} WHERE nodeID=1";

if ($conn->query($sql) === TRUE) {
	
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header("location: ./members.php");

?>