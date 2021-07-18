<?php
//require_once "config.php";

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator',     // Database name either 'elevator' or 'joinExample'
    'root',                                 // username
    'password'                                // Password
);

// Boilerplate - Return arrays with keys that are the field names in the database - Call the PDO method setAttribute()
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $query = 'INSERT INTO requests(floor) VALUES (:floor)';
    
    $statement = $db->prepare($query); 
    $params = [
        'floor' => 2
    ];
    $result = $statement->execute($params); 
    var_dump($result);
    echo '<br/><br/>';
    $rows = $db->query("SELECT * FROM requests");
    foreach($rows as $row) {
        var_dump($row);
        echo "<br/>";
    }
    echo '<br/><br/><br/>';

        //$con = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
        /*
        if($link->connection_error){
            die("Connection failed: " . $link->connection_error);
        }
        $sql  = 'INSERT INTO `requests` (`requestNumber`, `floor`) VALUES (NULL, \'{$floor}\')';

        if($link->$query($sql) === TRUE){
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }

        $link->close();
		*/
        //Insert a new requested floor to the elevators database
       // $stmt = $mysqli->prepare("'INSERT INTO `requests` (`requestNumber`, `floor`) VALUES (NULL, '?')");    
		//$stmt = mysqli_prepare($link, $sql)){
        
            // Bind variables to the prepared statement as parameters
	  //  $stmt->bind_param("i", $floor);
      //  $floor = _GET('floor');

        // Attempt to execute the prepared statement
		//if(mysqli_stmt_execute($stmt)){
      //      // Store result
       //     mysqli_stmt_store_result($stmt);
	//	}
      //  $stmt->execute();

      //  $result = $mysqli->query('SELECT requestNumber,floor FROM requests');
     //   echo $result
        
        // Close statement
     //   mysqli_stmt_close($stmt);
    //        
   // }
    /// Close connection
   // mysqli_close($link);
	//echo $_GET["floor"];
}
?>