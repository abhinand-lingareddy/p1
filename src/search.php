<?php
require 'dbconstants.php';
function search($conn,$user) {
	try {
		$stmt = $conn->prepare ( "SELECT name FROM account where name like  ? " );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "s", $user );
		
		$result = $stmt->execute ();
		$stmt->bind_result ( $name );
		$result = array ();
		for($i = 0; $stmt->fetch (); $i ++) {
			$result [$i] = $name;
		}
		echo json_encode ( $result );
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
	if (isset ( $_GET ["user"] )) {
		$user = "%{$_GET['user']}%";
	}
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	search($conn, $user);
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	$conn->close ();
}
?>