

<?php
require 'session.php';

require 'dbconstants.php';
function getusersbyarray($conn, $userarray, $withId) {
	$users = array ();
	if (sizeof ( $userarray ) !== 0) {
		$query = "select name,id from account where id= $userarray[0] ";
		for($i = 1; $i < sizeof ( $userarray ); $i ++) {
			$query = "$query or id=$userarray[$i]";
		}
		$result = $conn->query ( $query );
		
		while ( $row = $result->fetch_assoc () ) {
			if ($withId === true)
				array_push ( $users, [ 
						$row ["name"],
						( int ) $row ["id"] 
				] );
			else
				array_push ( $users, $row ["name"] );
		}
	}
	return $users;
}
function fetchmyprofile($conn, $id) {
	try {
		$stmt = $conn->prepare ( "SELECT name,email,dob,achievements,pendingrequests,connections FROM account where id=? " );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "i", $id );
		
		$result = $stmt->execute ();
		$stmt->bind_result ( $name, $email, $dob, $ach, $pendingrequests, $connections );
		if ($stmt->fetch ()) {
			$json_result ["name"] = $name;
			$json_result ["email"] = $email;
			$json_result ["dob"] = $dob;
			$json_result ["achievements"] = json_decode ( $ach, true );
			$stmt->free_result ();
			$pending_id_array = json_decode ( $pendingrequests, true );
			$connections_id_array = json_decode ( $connections, true );
			$json_result ["pendingrequests"] = getusersbyarray ( $conn, $pending_id_array, true );
			$json_result ["connections"] = getusersbyarray ( $conn, $connections_id_array, false );
			$user_json = json_encode ( $json_result );
			echo $user_json;
		} else {
			throw new Exception ( "error:db query fetch failed" );
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
	
	$username = $_SESSION ["username"];
	$id = $_SESSION ["id"];
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	fetchmyprofile($conn, $id);
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	$conn->close ();
}

?>
