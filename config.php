<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'Nolan');
   define('DB_PASSWORD', 'ESE2021');
   define('DB_DATABASE', 'elevator');
   $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>