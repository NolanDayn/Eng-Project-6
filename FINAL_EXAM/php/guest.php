<?php
	
require_once "config.php";

class Guest{
    private $username; //any INT

    public function __construct ($_username){
		//error checking here
        $this->username = $_username;
    }

    public function display_credentials() {
		$result = mysqli_query($link, "SELECT * FROM credentials WHERE username = '$username'");
		$row = mysqli_fetch_assoc($result);
		echo "<h6>Id: $row['id']</h6>";
		echo "<h6>Username: $row['username']</h6>";
		echo "<h6>email: $row['email']</h6>";
    }
	
	function __destruct() {
        $link->close();
    }

}
?>