<head>
<style>
table, th, td {
  border: 1px solid black;
}
table {
  border-collapse: collapse;
}

</style>
</head>

<body>
<form action="editCarNode.php">
  <label for="floor">New Floor Number:</label><br>
  <input type="text" id="floor" name="floor" value="1"><br>
  <input type="submit" value="Submit">
</form>

<table>
  <tr>
    <th>Node ID</th>
    <th>Info</th>
    <th>Status</th>
	<th>Floor Number</th>
  </tr>

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
$sql = "SELECT * FROM elevatorNodes LEFT JOIN carNode ON elevatorNodes.nodeID = carNode.nodeID";
//$sql = "SELECT * FROM elevatorNodes";
$result = $conn->query($sql);


  // output data of each row
while($row = $result->fetch_assoc()) {
	echo "<tr><td>{$row['nodeID']}</td><td>{$row['info']}</td><td>{$row['status']}</td><td>{$row['floorNumber']}</td></tr>";
}


$conn->close();

?>

</table>
</body>

