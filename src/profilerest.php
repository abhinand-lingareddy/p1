//request pending case yet to do

<?php
require 'dbconstants.php';
session_start ();
function fetchprofile($conn,$user){
	try{
		$stmt = $conn->prepare ( "SELECT id,name,email,dob,achievements,connections,pendingrequests FROM account where name=? " );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "s", $user );
		
		$result = $stmt->execute ();
		$stmt->bind_result ( $id, $name, $email, $dob, $ach, $connections, $pendingrequests );
		if ($stmt->fetch ()) {
			$json_result ["id"] = $id;
			$json_result ["name"] = $name;
			$json_result ["email"] = $email;
			$json_result ["dob"] = $dob;
			$json_result ["achievements"] = json_decode ( $ach, true );
			$json_result ["connections"] = json_decode ( $connections, true );
			if (isset ( $_SESSION ["id"] )) {
				$session_user_id = $_SESSION ["id"];
				$pending_requests_json = json_decode ( $pendingrequests, true );
				$json_result ["pendingrequest"] = array_search ( $session_user_id, $pending_requests_json ) !== false;
			}
			$user_json = json_encode ( $json_result );
			echo $user_json;
		}
		
		else {
			throw new Exception ( "error:db query fetch failed" );
		}
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
	if (isset ( $_GET ["user"] )) {
		$user = $_GET ["user"];
	} else if (isset ( $_SESSION ["username"] )) {
		$user = $_SESSION ["username"];
	}
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	fetchprofile($conn, $user);
	
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	$conn->close ();
}

?>
