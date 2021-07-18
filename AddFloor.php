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

    $floor = $_GET["floor"];
    $query = 'INSERT INTO requests(floor) VALUES (:floor)';
    
    $statement = $db->prepare($query); 
    $params = [
        'floor' => $floor
    ];
    $result = $statement->execute($params); 
    $rows = $db->query("SELECT * FROM requests");

    $dbdata = array();

    foreach($rows as $row) {
        $dbdata[] = ($row);
    }
    echo json_encode($dbdata);
        
            
}
?>