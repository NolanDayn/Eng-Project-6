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
					<?php
						$error = $_GET["error"];
						if(isset($error) && $error != ""){
							echo '<p class = "errorMsg">';
							echo "" . htmlspecialchars($error) . "";
							echo '</p>';
						}
					?>
				</div>
				<div>
					<label for="password" class="text_label">Password: </label>  
					<input id="password" class="text_input" type="text" name="password"  /> 
				</div>
				<input id="submitButton" type="submit" value="Login">

			</fieldset>
		</form>
		
<div id="intro" class="jumbotron text-center">
	<h3>Available Logbook Usernames</h3>

</div>



<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
