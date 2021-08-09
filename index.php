<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="./icons/logo.ico" />

  <title>Team 4 Elevator Project</title>
  
  <!-- no cache for sanity -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>
	<!-- bootstrap stuff -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<!-- Chart.js -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
<?php require "navbar.php" ?>

<!-- Error Bar -->
<?php
$error = $_GET["error"];
if(isset($error) && $error != ""){
    echo '<h6 class = "error_text">';
	echo "" . htmlspecialchars($error) . "";
	echo '</h6>';
}
?>

<!-- Introduction -->
<div id="intro" class="jumbotron text-center">
	<h1>Introduction</h1>
	<p>This is the home page for the elevator project created by Nolan Thomas, Ruchi Patil and Stephane Durette</p>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/scnOnqeBsO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<p style="text-align:left;margin-left:10px;">The project spans 14 weeks and will teach us:</p>
	<ul>
	<li style="text-align:left">The basics of front-end development</li>
	<li style="text-align:left">The basics of back-end development</li>
	<li style="text-align:left">Database management</li>
	<li style="text-align:left">The basics of the CAN protocol</li>
	</ul>
</div>
<div class="parallax"></div>

<!-- Three.js Test -->
<div id ="threeContainer" class="jumbotron text-center">
	<h1>Three.js test</h1>
	<canvas id="threeCanvas" width="800" height="600"></canvas>
</div>
<div class="parallax"></div>

<!-- About Us -->
<div id="about" class="jumbotron text-center">
	<h1>About Us</h1>

<div class="row">
<div class="center">	

<!-- nolan's card -->
<div class="container mt-3 col-sm-4" style="width: 400px;">
	<div class="card">
		<img class="card-img-bottom" src= "https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190530183756/Good-Habits-for-developers-programmers.png" style="width: 100%;" />
        <div class="card-body">
            <h4 class="card-title">Nolan Thomas</h4>
            <p class="card-text">What a guy</p>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-github"></i>  GitHub</a>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i> Linked-In</a>
			<a href="./nolan-page.html" class="btn btn-success btn-sm"><i class="fas fa-info"></i> Learn more</a>
        </div>
    </div>	
</div>

<!-- ruchi's card -->
<div class="container mt-3 col-sm-4" style="width: 400px;">
	<div class="card">
		<img class="card-img-bottom" src= "https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190530183756/Good-Habits-for-developers-programmers.png" style="width: 100%;" />
        <div class="card-body">
            <h4 class="card-title">Ruchi Patil</h4>
            <p class="card-text">Certified best developper in the world</p>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-github"></i>  GitHub</a>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i> Linked-In</a>
			<a href="#" class="btn btn-success btn-sm"><i class="fas fa-info"></i> Learn more</a>
        </div>
    </div>	
</div>

<!-- stephane's card -->
<div class="container mt-3 col-sm-4" style="width: 400px;">
	<div class="card">
		<img class="card-img-bottom" src= "https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190530183756/Good-Habits-for-developers-programmers.png" style="width: 100%;" />
        <div class="card-body">
            <h4 class="card-title">Stephane Durette</h4>
            <p class="card-text">We don't talk about him</p>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-github"></i>  GitHub</a>
			<a href="#" class="btn btn-primary btn-sm"><i class="fab fa-linkedin"></i> Linked-In</a>
			<a href="#" class="btn btn-success btn-sm"><i class="fas fa-info"></i> Learn more</a>
        </div>
    </div>	
</div>
</div>
</div>
</div>
<div class="parallax"></div>

<!--elevator controls-->
<div id="controls" class="jumbotron text-center">
	<h1>Test Controls</h1>
	<?php
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	} else {
		echo '<h6 class = "error_text">Login in order to control the elevator</h6>';
	}
	?>
	<div class = "container">
		<div class = "row">
			<div class = "col-sm-4">
				<div class="row">
					<button style="height:128px;margin:10px;font-size:70px" class="get_floor_3 btn-primary col-sm-5"><i class="fas fa-arrow-up"></i></button>
					<button style="height:128px;margin:10px;font-size:70px"class="get_floor_3 btn-primary col-sm-5"><i class="fas fa-arrow-down"></i></button>
				</div>
				<div class="row">
					<button style="height:128px;margin:10px;font-size:70px"class="get_floor_2 btn-primary col-sm-5"><i class="fas fa-arrow-up"></i></button>
					<button style="height:128px;margin:10px;font-size:70px"class="get_floor_2 btn-primary col-sm-5"><i class="fas fa-arrow-down"></i></button>
				</div>
				<div class="row">
					<button style="height:128px;margin:10px;font-size:70px"class="get_floor_1 btn-primary col-sm-5"><i class="fas fa-arrow-up"></i></button>
					<button style="height:128px;margin:10px;font-size:70px"class="get_floor_1 btn-primary col-sm-5"><i class="fas fa-arrow-down"></i></button>
				</div>
				
			</div>
			<div class="col-sm-4" id="sprite-image"></div>
			<div class="col-sm-4">
				<h3>Inside the elevator</h3>
				<div class="row">
					<button style="font-size:50px" class="get_floor_1 col-sm-4 btn-primary">1</button>
					<button style="font-size:50px" class="get_floor_2 col-sm-4 btn-primary">2</button>
					<button style="font-size:50px" class="get_floor_3 col-sm-4 btn-primary">3</button>
				</div>
				<div class="row">
					<button style="font-size:50px" id="openButton" class="col-sm-4 btn-primary"><i class="fas fa-door-open"></i></button>
					<button style="font-size:50px" id="closeButton" class="col-sm-4 btn-primary"><i class="fas fa-door-closed"></i></button>
					<button style="font-size:50px" id="alarmButton" class="col-sm-4 btn-primary"><i class="fas fa-bell"></i></button>
				</div>
				<div class="row">
					<button style="font-size:50px" id = "sabbathOn" class="col-sm-4 btn-success"><i class="fas fa-star-of-david"></i> On</button>
					<button style="font-size:50px" id = "sabbathOff" class="col-sm-4 btn-danger"><i class="fas fa-star-of-david"></i> Off</button>
				</div>
			</div>
		</div>
	</div>
		<!-- Tables -->
		<h3>Request Logs</h3>
		<table id = "requestTable"></table>
		<h3>Elevator Status</h3>
		<table id = "statusTable"></table>
</div>
<div class="parallax"></div>

<!-- Charts -->
<div id="charts" class="jumbotron text-center">
	<h1>Charts</h1>
	<div id="chart-container">
		<div class="row">
			<button id = "barGraphB" class="btn-primary">Pie Chart</button>
			<button id = "pieChartB" class="btn-primary">Bar Chart</button>
		</div>
		<div id = "canvasContainer">
			<!-- <canvas id="mycanvas" width="800" height="600"></canvas> -->
		</div>
    </div>
</div>
<div class="parallax"></div>

<!-- STM DEMOS -->
<div id="stm_demos" class="jumbotron text-center">
	<h1>STM demos</h1>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/scnOnqeBsO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/TkJEqkO0AtU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/IrQav-2-4Dw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
</div>
<div class="parallax"></div>

<!-- State Machine -->
<div id="state_machine" class="jumbotron text-center">
	<h1>State machine diagram</h1>
	<img src="https://docs.google.com/drawings/d/e/2PACX-1vQQe9RNzqgKsA5gBZfs81BUEiTJY2zVHnR43YdbP8gYwdOr2Wq7F-baeLg3oceFKcSx3OvU3Ps_i3dr/pub?w=1008&amp;h=573"></div>
<div class="parallax"></div>

<!-- Logic Flow -->
<div id="logic_flow" class="jumbotron text-center">
	<h1>Elevator Floor Selection Logic</h1>
	<img src="./images/floor_selection.png"></div>
</div>
<div class="parallax"></div>

<!-- Gantt Chart -->
<div id="gantt" class="jumbotron text-center">
	<h1>Gantt Chart</h1>
	<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDBtbgvbIWO9WIzpp9vJ20KEZ_K3mandtQRb3Tu4tn12A3BbYUTxbzlcLyMeCuguzXVGTTlYClotTr/pubhtml?gid=0&single=true"></iframe>
</div>
<div class="parallax"></div>

<!-- Nolan's Logbook -->
<div id="nolan_log" class="jumbotron text-center">
	<h1>Nolan's Logbook</h1>
	<iframe src="https://docs.google.com/document/d/e/2PACX-1vSA3KSqcS9mg9JWIJbEOWE1sJCtbyuC2UukSrVdErqFDCcgzC7yAsCOGnFatX0fM1u0BnsDC0hTgBfv/pub"></iframe>
</div>
<div class="parallax"></div>

<!-- Ruchi's Logbook -->
<div id="ruchi_log" class="jumbotron text-center">
	<h1>Ruchi's Logbook</h1>
	<iframe src="https://docs.google.com/document/d/e/2PACX-1vQSeFl8eVzFnkMTQ01PqIIvscK6LbhiNcABuZ3WtGSmQFrgBh77_BOIj8Au6T6NRYGwq3TRP9bp_dDN/pub"></iframe>
</div>
<div class="parallax"></div>

<!-- Stephane's Logbook -->
<div id="stephane_log" class="jumbotron text-center">
	<h1>Stephane's Logbook</h1>
	<iframe src="https://docs.google.com/document/d/e/2PACX-1vTWJ84YrTNRfRiqc8k4T8vk5dm0-zIDfErfRWkbKPX0GHA6hdG_g0rneNT9IK3tvWeJ7zwvfOxGQtkY/pub"></iframe>
</div>
<div class="parallax"></div>

<!-- Status Reports -->
<div id="status" class="jumbotron text-center">
	<h1>Status Reports</h1>
	<div class= "container">
		<div class="row">
			<form method="get" action="./status_reports/Week_1.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 1</button></form>
			<form method="get" action="./status_reports/Week_2.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 2</button></form>
			<form method="get" action="./status_reports/Week_3.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 3</button></form>
			<form method="get" action="./status_reports/Week_4.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 4</button></form>
		</div>
		<div class="row">
			<form method="get" action="./status_reports/Week_5.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" >Week 5</button></form>
			<form method="get" action="./status_reports/Week_6.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" >Week 6</button></form>
			<form method="get" action="./status_reports/Week_7.doc"><button type="submit" class="btn_status_download btn btn-danger btn-lg col-sm-2" disabled>Success Week</button></form>
			<form method="get" action="./status_reports/Week_8.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" >Week 8</button></form>
		</div>
		<div class="row">
			<form method="get" action="./status_reports/Week_9.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 9</button></form>
			<form method="get" action="./status_reports/Week_10.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2">Week 10</button></form>
			<form method="get" action="./status_reports/Week_11.doc"><button type="submit" class="btn_status_download btn btn-success btn-lg col-sm-2">Week 11</button></form>
			<form method="get" action="./status_reports/Week_12.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 12</button></form>
		</div>
		<div class="row">
			<form method="get" action="./status_reports/Week_13.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 13</button></form>
			<form method="get" action="./status_reports/Week_14.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 14</button></form>
		</div>
		
	</div>
</div>

<!-- javascript -->

<?php
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		echo '<script src="js/main.js"></script>';
	} else {
	}
?>

<!-- <script src="js/three.js"></script> -->
<script type="module" src="js/threeTest.js"></script>
<script type="text/javascript" src="js/chart.js"></script>

</body>
</html>
