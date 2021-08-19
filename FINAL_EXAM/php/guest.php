<?php
	
require_once "config.php";

class Guest{
    private $username; //any INT

    public function __construct ($_username){
		//error checking here
        $this->username = $_username;
    }

    public function display_credentials() {
		/*
		$result = mysqli_query($link, "SELECT * FROM credentials WHERE username = '$username'");
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<h5>" . $row['id'] . "</h5>";
		}
		*/
		echo "$username";
    }
	
	function __destruct() {
        $link->close();
    }

}
?>