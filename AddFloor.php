<?php
require_once "config.php";

// Processing form data when form is submitted
$floor = $_GET["floor"];

if($_SERVER["REQUEST_METHOD"] == "GET"){

        $con = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
        
        //if($con->connection_error){
         //   die("Connection failed: " . $con->connection_error);
        //}
        //$sql= "INSERT INTO requests (floor) VALUES ('$floor')";

        //if($con->$query($sql) === TRUE){
        //    echo "New record created successfully";
        //} 
        //else {
        //    echo "Error: " . $sql . "<br>" . $con->error;
        //}

        $con->close();

        //Insert a new requested floor to the elevators database
        //$stmt = $mysqli->prepare("INSERT INTO requests(floor) VALUE(?)");    
       // $stmt = mysqli_prepare($link, $sql)){
        
            // Bind variables to the prepared statement as parameters
       // mysqli_stmt_bind_param("is", $floor);
        

        // Attempt to execute the prepared statement
       // if(mysqli_stmt_execute($stmt)){
      //      // Store result
       //     mysqli_stmt_store_result($stmt);
       // }
        
        // Close statement
       // mysqli_stmt_close($stmt);
    //        
   // }
    /// Close connection
   // mysqli_close($link);
       }
	echo $_GET["floor"];
?>