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

    //Place the new floor request into the requests table
    $floor = $_GET["floor"];
    $query = 'INSERT INTO requests(floor) VALUES (:floor)';
    
    $statement = $db->prepare($query); 
    $params = [
        'floor' => $floor
    ];
    $result = $statement->execute($params); 

    //echo a json of the requests table back
    $rows = $db->query("SELECT * FROM requests ORDER BY requestNumber DESC LIMIT 5");

    $dbdata = array();
    $elevatorData = array();

    foreach($rows as $row) {
        $dbdata[] = ($row);
    }
    $elevatorData[] = json_encode($dbdata);

    //Get the current floor so we can use this in floors requested!!!!
    //Give back elevator status as json
    $rows = $db->query("SELECT * FROM elevatorStatus");
    $dbdata = array();
    foreach($rows as $row) {
        $dbdata[] = ($row);
    }
    $elevatorData[] = json_encode($dbdata);
    print_r($elevatorData)

    //Add request into the floors requested table
    $query = 'INSERT INTO floorsRequested(requestedFloor, startingFloor) VALUES (:requestedFloor, :currentFloor)';
    
    $statement = $db->prepare($query); 
    $params = [
        'requestedFloor' => $floor,
        'currentFloor' => 1
    ];
    $result = $statement->execute($params); 


}


?>