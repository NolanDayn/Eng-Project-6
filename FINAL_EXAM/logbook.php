<?php
	session_start();
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="./icons/logo.ico" />

  <title>Login</title>
  
  <!-- no cache for sanity -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>
<!-- Navigation Bar-->
<?php require "navbar.php" ?>

<div id="intro" class="jumbotron text-center">

<?php
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		if($_SESSION["isUser"] === 1){
			echo "<h1>You are a user!</h1>";
			
			echo '<form id="form" action="./php/updateCredentials.php" method="post">';
			echo '<fieldset>';
			echo '	<legend>Credentials</legend>';
			echo '<div>';
			echo '<label for="email" class="text_label" >email: </label>';
			echo '<input id="email" class="text_input" type="text" name="email"  /> ';

			echo ' </div>';
			echo '<div> ';
			echo ' <label for="password" class="text_label">Password: </label>  ';
			echo '<input id="password" class="text_input" type="text" name="password"  /> ';
			echo '</div>';
			echo '<input id="submitButton" type="submit" value="Update">';

			echo '</fieldset>';
			echo '</form>';
		
			
			require_once('php/user.php');
			$guest = new User($_SESSION["username"]);
			$guest->display_credentials();
			$guest->display_logbooks();
			
		} else {
			echo "<h1>You are a guest!</h1>";
			
			require_once('php/guest.php');
			$guest = new Guest($_SESSION["username"]);
			$guest->display_credentials();
			$guest->display_logbooks();
		}
	} else {
		header("location: login.php?error=You need to be logged in to view this page");
	}
?> 

</div>
</body>
</html>
