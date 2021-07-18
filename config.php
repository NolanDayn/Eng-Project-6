<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'your_password_here');
   define('DB_DATABASE', 'elevatorproject');
   $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>