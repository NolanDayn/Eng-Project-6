<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session.
	session_destroy();
 
	// Redirect to login page
	header("location: Logged-Out.php");
	exit;
}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="logo.ico" />

  <title>Team 4 Elevator Project</title>
  
  <!-- no cache for sanity -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>

<body>
	<!-- bootstrap stuff -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- music player -->
	<audio controls autoplay muted loop id="music_player">
		<source src="./music/music.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio>
	
	<!-- misc sounds -->
	<audio id="button_click" src="https://www.trekcore.com/audio/computer/computerbeep_9.mp3" preload="auto"></audio>
	<audio id="door_open" src="https://www.trekcore.com/audio/doors/jefferies_tube.mp3" preload="auto"></audio>
	<audio id="door_close" src="https://www.trekcore.com/audio/doors/raven_door.mp3" preload="auto"></audio>
	<audio id="arrival_sound" src="https://www.trekcore.com/audio/doors/ent_doorchime.mp3" preload="auto"></audio>

<!-- Navigation Bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ESE Elevator Project Team 4</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
	  
	  <!-- form -->
      <form class="navbar-form navbar-left" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <button type="submit" class="btn btn-danger" name="submit">Logout</button>
      </form>
	  
      <ul class="nav navbar-nav navbar-right">
		<li style="font-size:22px;font-color:black"><a href="#intro">Welcome to the site, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</a></li>
        <li><a href="#intro">Introduction</a></li>
		<li><a href="#about">About Us</a></li>
		<li><a href="./elevator-controls.html">Elevator Controls</a></li>
		<li><a href="./extra.html">Control Scheme</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentation <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#gantt">Gantt Chart</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#nolan_log">Logbook - Nolan</a></li>
			<li><a href="#ruchi_log">Logbook - Ruchi</a></li>
			<li><a href="#stephane_log">Logbook - Stephane</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#status">Status Reports</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		<script src="control.js"></script>
</body>
</html>