

<form action="editCarNode.php">
  <label for="floor">New Floor Number:</label><br>
  <input type="text" id="floor" name="floor" value="1"><br>
  <input type="submit" value="Submit">
</form>

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

$sql = "SELECT * FROM elevatorNodes";
$result = $conn->query($sql);


  // output data of each row
while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	echo "<h1>hi</h1>";
}


$conn->close();

?>

