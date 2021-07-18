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
    $floor = $_GET["floor"]

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
    }
?>