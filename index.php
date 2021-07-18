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

<!-- Elevator Controls -->
<div id="controls" class="jumbotron text-center">
	<h1>Controls</h1>
	<div class="container">
		<div class = "row">
			<h2>Inside Elevator</h2>
			<!-- 1 -->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6 display_active" id="floor_1_display">1</h1>
					<div onClick="SetFloor(0)" class="control col-sm-6" id="floor_1_button"></div>
				</div>
			</div>
			<!-- 2 -->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="floor_2_display">2</h1>
					<div onClick="SetFloor(1)" class="control col-sm-6" id="floor_2_button"></div>
				</div>
			</div>
			<!-- 3 -->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="floor_3_display">3</h1>
					<div onClick="SetFloor(2)" class="control col-sm-6" id="floor_3_button"></div>
				</div>
			</div>
			<div class="col-sm-12"></div> <!-- new row -->
			<!-- open doors-->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6 display_active" id="door_open_display"><i class="fas fa-door-open fa-sm"></i></h1>
					<div onClick="MoveDoors(true)" class="control col-sm-6" id="door_open_button"></div>
				</div>
			</div>
			<!-- close doors-->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="door_close_display"><i class="fas fa-door-closed fa-sm"></i></h1>
					<div onClick="MoveDoors(false)" class="control col-sm-6" id="door_close_button"></div>
				</div>
			</div>
			<!-- alarm -->
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="music_display"><i class="fas fa-bell fa-sm"></i></h1>
					<div onClick="ToggleMusic()" class="control col-sm-6" id="music_button"></div>
				</div>
			</div>
			
			<div class="col-sm-12"></div> <!-- new row -->
			
			<!-- Floor 3 Outside -->
			<h2 class = "col-sm-12">Floor 3 Outside</h2>
			
			<div class="elevator_button container col-sm-2">
			</div>
			
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="music_display"><i class="fas fa-arrow-down fa-sm"></i></h1>
					<div onClick="" class="control col-sm-6" id=""></div>
				</div>
			</div>
			
			<!-- Floor 2 Outside -->
			<h2 class = "col-sm-12">Floor 2 Outside</h2>
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="music_display"><i class="fas fa-arrow-up fa-sm"></i></h1>
					<div onClick="" class="control col-sm-6" id=""></div>
				</div>
			</div>
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="music_display"><i class="fas fa-arrow-down fa-sm"></i></h1>
					<div onClick="" class="control col-sm-6" id=""></div>
				</div>
			</div>
			
			<!-- Floor 1 Outside -->
			<h2 class = "col-sm-12">Floor 1 Outside</h2>
			<div class="elevator_button container col-sm-2">
				<div class="row">
					<h1 class="col-sm-6" id="music_display"><i class="fas fa-arrow-up fa-sm"></i></h1>
					<div onClick="" class="control col-sm-6" id=""></div>
				</div>
			</div>
			<div class="elevator_button container col-sm-2">
			</div>
			
			
			
		</div>
	</div>
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
			<form method="get" action="./status_reports/Week_7.doc"><button type="submit" class="btn_status_download btn btn-success btn-lg col-sm-2" >Week 7</button></form>
			<form method="get" action="./status_reports/Week_8.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 8</button></form>
		</div>
		<div class="row">
			<form method="get" action="./status_reports/Week_9.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 9</button></form>
			<form method="get" action="./status_reports/Week_10.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 10</button></form>
			<form method="get" action="./status_reports/Week_11.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 11</button></form>
			<form method="get" action="./status_reports/Week_12.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 12</button></form>
		</div>
		<div class="row">
			<form method="get" action="./status_reports/Week_13.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 13</button></form>
			<form method="get" action="./status_reports/Week_14.doc"><button type="submit" class="btn_status_download btn btn-primary btn-lg col-sm-2" disabled>Week 14</button></form>
		</div>
		
	</div>
</div>

<!-- javascript -->
<script src="js/main.js"></script>

</body>
</html>
