<?php
include 'dbconstants.php';
function register($conn,$name, $email, $dob, $password){
	try{
		// prepare and bind
		$stmt = $conn->prepare ( "INSERT INTO account (name, email,dob,password,achievements,connections,pendingrequests) VALUES (?, ?, ?, ?, '[]', '[]', '[]')" );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "ssss", $name, $email, $dob, $password );
		$stmt->execute ();
		
	}catch (Exception $e){
		throw $e;
	}
	finally {
		$stmt->close ();
		
	}
	
}

try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	
	$name = $_POST ["name"];
	$email = $_POST ["email"];
	$dob = $_POST ["dob"];
	$password = $_POST ["password"];
	
	// Validate e-mail
	if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
		// error
	}
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	register($conn, $name, $email, $dob, $password);
	

	header ( "location: login.php" );
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
	} finally{
	$conn->close ();
}

?>