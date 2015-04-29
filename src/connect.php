<?php
require 'session.php';
require 'dbconstants.php';
function connect($conn,$id,$connectId) {
	$stmt = $conn->prepare ( "SELECT connections FROM account where id = ?" );
	$stmt->bind_param ( "i", $id );
	
	$result = $stmt->execute ();
	$stmt->bind_result ( $entity );
	if ($stmt->fetch ()) {
		$stmt->free_result ();
		$entity_array = json_decode ( $entity, true );
		array_push ( $entity_array, $connectId );
		$encoded_entity = json_encode ( $entity_array, true );
		
		$stmt = $conn->prepare ( "UPDATE account set connections = ?  where id = ?" );
		$stmt->bind_param ( "si", $encoded_entity, $id );
		$stmt->execute ();
	} else {
		echo "failure";
	}
}
try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	$postdata = file_get_contents ( "php://input" );
	$postdata_json = json_decode ( $postdata, true );
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$id = $_SESSION ['id'];
	$connectId = $postdata_json ['connectId'];
	//start tranaction
	connect($conn, $id, $connectId);
	connect($conn, $connectId, $id);
	//end transaction
	$stmt = $conn->prepare ( "SELECT pendingrequests FROM account where id = ?" );
	$stmt->bind_param ( "i", $id );
	
	$result = $stmt->execute ();
	$stmt->bind_result ( $entity );
	if ($stmt->fetch ()) {
		$stmt->free_result ();
		if ($entity !== NULL) {
			$entity_array = json_decode ( $entity, true );
		}
			$record_id = array_search ( $record, $entity_array );
		
		array_splice ( $entity_array, $record_id, 1 );
		$encoded_entity = json_encode ( $entity_array );
		$stmt = $conn->prepare ( "UPDATE account set pendingrequests = ?  where id = ?" );
		$stmt->bind_param ( "si", $encoded_entity, $id );
		$stmt->execute ();
	} else {
		echo "failure";
	}
} 

catch ( Exception $e ) {
	// error
} finally{
	$conn->close ();
}

?>