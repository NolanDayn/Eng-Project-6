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

        <form id="form" action="./php/authenticateUser.php" method="post">
			<fieldset>
				<legend>Login</legend>
				<div>
					<label for="userName" class="text_label" >User Name: </label>
					<input id="userName" class="text_input" type="text" name="userName"  /> 
					<p class="errorMsg" id="usernameError"></p>
				</div>
				<div>
					<label for="password" class="text_label">Password: </label>  
					<input id="password" class="text_input" type="text" name="password"  /> 
					<p class="errorMsg" id="passwordError"></p>
				</div>
				<input id="submitButton" type="submit" value="Login">

			</fieldset>
		</form>
		
<div id="intro" class="jumbotron text-center">
	<h1>Available Logbook Usernames</h1>
<?php

require_once "config.php";
$result = $link->query("SELECT * FROM credentials ORDER BY username DESC");

while ($row = mysql_fetch_array($result))
{
     echo $row['username'] . "<br/>";
}

?>

</div>



<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
