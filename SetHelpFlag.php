<?php
require_once "config.php";

$sql = "UPDATE elevatorStatus SET helpFlag=1 WHERE 1";

if ($link->query($sql) === TRUE) {
	
} else {
  echo "Error updating record: " . $link->error;
}

$link->close();
?>