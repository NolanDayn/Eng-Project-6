<?php
require_once "config.php";

$login_err = "";
$user = $_POST["userName"];
$pass = $_POST["password"];


if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
	$result = mysqli_query($link, "SELECT * FROM credentials WHERE username = '$user'");
	
	if($result->num_rows == 0) {	
     	$login_err = "User doesn't exist";
		header("location: ../login.php?error=$login_err");
	} else {
		if ($pass == ""){
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $username;  
			$_SESSION["isUser"] = 0; 
			header("location: ../logbook.php");
		} else {
			$row = mysqli_fetch_assoc($result);
			if (password_verify($pass, $row['password'])) {
				$_SESSION["loggedin"] = true;
				$_SESSION["username"] = $username;  
				$_SESSION["isUser"] = 1; 
                
				header("location: ../logbook.php");
            } else {
				$login_err = "Incorrect Password";
				header("location: ../login.php?error=$login_err");
            }
		}
	}
}

$link->close();

?>