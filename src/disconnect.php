<?php
require 'session.php';
require 'dbconstants.php';
function disconnect($conn, $id, $connectId) {
	try{
	$stmt = $conn->prepare ( "SELECT connections FROM account where id = ?" );
	if ($stmt === false) {
		throw new Exception ( "error:db query error" );
	}
	$stmt->bind_param ( "i", $id );
	
	$result = $stmt->execute ();
	$stmt->bind_result ( $entity );
	if ($stmt->fetch ()) {
		$stmt->free_result ();
		$entity_array = json_decode ( $entity, true );
		$record_id = array_search ( $connectId, $entity_array );
		array_splice ( $entity_array, $record_id, 1 );
		$encoded_entity = json_encode ( $entity_array, true );
		
		$stmt = $conn->prepare ( "UPDATE account set connections = ?  where id = ?" );
		$stmt->bind_param ( "si", $encoded_entity, $id );
		$stmt->execute ();
	} else {
		throw new Exception ( "error:db query fetch failed" );
			}
	}
	catch (Exception $e){
		throw e;
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
	$postdata = file_get_contents ( "php://input" );
	$postdata_json = json_decode ( $postdata, true );
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	
	$id = $_SESSION ['id'];
	$connectId = $postdata_json ['connectId'];
	// start tranaction
	disconnect ( $conn, $id, $connectId );
	disconnect ( $conn, $connectId, $id );
	// end transaction
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
	} finally{
	$conn->close ();
}

?>