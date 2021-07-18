<?php
	session_start();
?>

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

<?php
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		
		echo '<form class="navbar-form navbar-left" action="./logout.php" method="POST">';
		echo '<button type="submit" class="btn btn-danger" name="submit">Logout</button>';
		echo 'Hello ' + htmlspecialchars($_SESSION["username"]) + '!';
		echo '</form>';
	} else {
		echo '<form class="navbar-form navbar-left" action="./login.php" method="POST">';
		echo '<div class="form-group">';
		echo '<input type="text" class="form-control" name="username" placeholder="username">';
		echo '<input type="password" class="form-control" name="password" placeholder="password">';
		echo '</div>';
		echo '<button type="submit" class="btn btn-primary" name="submit">Login</button>';
		echo '</form';
	}
?>
      </form>
	  
      <ul class="nav navbar-nav navbar-right">
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