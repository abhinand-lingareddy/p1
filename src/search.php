<?php
require 'dbconstants.php';

try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	if(isset($_GET["user"])){
		$user="%{$_GET['user']}%";
	}
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}

	$stmt = $conn->prepare ( "SELECT name FROM account where name like  ? " );
	$stmt->bind_param ( "s", $user );

	$result = $stmt->execute ();
	$stmt->bind_result ( $name );
	$result=array();
	for($i=0;$stmt->fetch();$i++){
		$result[$i]=$name;
	}
	echo json_encode($result);
}

catch ( Exception $e ) {
	// error
} finally{
	$conn->close ();
}
?>