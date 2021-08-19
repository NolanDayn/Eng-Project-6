<?php


class Guest{
    private $username; //any INT
	private $l;

    public function __construct ($_username){
		//error checking here
        $this->username = $_username;
		require_once "config.php";
		$this->l = $link;
    }

    public function display_credentials() {
		
		$u = $this->username;
		$result = mysqli_query($this->l, "SELECT * FROM credentials WHERE username = '$this->username'");
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<h5>" . $row['id'] . "</h5>";
		}
		
		//echo "<h5>" . $this->username . "</h5>" ;
    }
	
	function __destruct() {
        $this->l->close();
    }

}
?>