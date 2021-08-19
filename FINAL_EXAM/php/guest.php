<?php


class Guest{
    private $username; //any INT
	private $id;
	private $l;

    public function __construct ($_username){
		//error checking here
        $this->username = $_username;
		require_once "config.php";
		$this->l = $link;
    }

    public function display_credentials() {
		
		$result = mysqli_query($this->l, "SELECT * FROM credentials WHERE username = '$this->username'");
		
		echo "<h1>Credentials</h1>";
		
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<h5> Id: " . $row['id'] . "</h5>";
			echo "<h5> Username: " . $row['username'] . "</h5>";
			echo "<h5> email: " . $row['email'] . "</h5>";
			$this->id = $row['id'];
		}
    }
	
	public function display_logbooks(){
		$result = mysqli_query($this->l, "SELECT * FROM logbookEntries WHERE id = '$this->id'");
		echo "<h1>Logbooks</h1>";
		while($row = mysqli_fetch_assoc($result))
		{
			echo "Id: " . $row['id'] . "Date: " . $row['date'] . "Time: " . $row['time'] . "Text: " . $row['text'] . "</br>";
		}
	}
	
	function __destruct() {
        $this->l->close();
    }

}
?>