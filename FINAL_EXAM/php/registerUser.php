<?php

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=logbook',   
    'root',                                
    'password'                           
);

$login_err = "";

// Boilerplate - Return arrays with keys that are the field names in the database - Call the PDO method setAttribute()
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "GET"){
	/*
	if(userExists($db, $_GET["username"])){
		$login_err = "User already exists";
		header("location: ../register.php?error=$login_err");
	} 
	*/
	$query = 'INSERT INTO credentials(username, password, email) VALUES (:u, :p, :e)';
    
    $statement = $db->prepare($query); 
    $params = [
        'u' => "",
        'p' => "",
		'e' => ""
    ];
    $result = $statement->execute($params); 

	header("location: ../register.php?error=$login_err");
}

function userExists($pdo, $user) {
    $stmt = $pdo->prepare("SELECT 1 FROM credentials WHERE username=?");
    $stmt->execute([$user]); 
    return $stmt->fetchColumn();
)


?>