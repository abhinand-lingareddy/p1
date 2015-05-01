<?php
require 'dbconstants.php';
function login($conn,$email, $password) {
	try {
		$stmt = $conn->prepare ( "SELECT id,name FROM account where email=? and password=?" );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "ss", $email, $password );
		
		$result = $stmt->execute ();
		$stmt->bind_result ( $id, $name );
		if ($stmt->fetch ()) {
			session_start ();
			$_SESSION ["username"] = $name;
			$_SESSION ["id"] = $id;
			header ( "location: index.php" );
		} else {
			header ( "location: login.php" );
		}
	} catch ( Exception $e ) {
		throw $e;
	} finally {
		$stmt->close ();
		
	}
}

try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	
	$email = $_POST ["email"];
	$password = $_POST ["password"];
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	login($conn, $email, $password);
	
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	$conn->close ();
}

?>