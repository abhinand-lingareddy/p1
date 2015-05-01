<?php
require 'session.php';
require 'dbconstants.php';
function getIfSet($json, $key) {
	if (isset ( $json [$key] )) {
		return $json [$key];
	}
	return null;
}
function update($conn,$record_type,$id,$record,$record_id) {
	try {
		$stmt = $conn->prepare ( "SELECT $record_type FROM account where id = ?" );
		if ($stmt === false) {
			throw new Exception ( "error:db query error" );
		}
		$stmt->bind_param ( "i", $id );
		
		$result = $stmt->execute ();
		$stmt->bind_result ( $entity );
		if ($stmt->fetch ()) {
			$stmt->free_result ();
			$entity_array = json_decode ( $entity, true );
			if ($record_id === NULL) {
				array_push ( $entity_array, $record );
			} else {
				$entity_array [$record_id] = $record;
			}
			$encoded_entity = json_encode ( $entity_array, true );
			
			$stmt = $conn->prepare ( "UPDATE account set $record_type = ?  where id = ?" );
			$stmt->bind_param ( "si", $encoded_entity, $id );
			$stmt->execute ();
		} else {
			throw new Exception ( "error:db query fetch failed" );
		}
	} catch ( Exception $e ) {
		throw $e;
	} finally {
		$stmt->close();
	}
}
try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	$postdata = file_get_contents ( "php://input" );
	$postdata_json = json_decode ( $postdata, true );
	
	$record_type = $postdata_json ['record_type'];
	$session = getIfSet ( $postdata_json, 'session' );
	
	if ($session == null) {
		$record = $_SESSION ['id'];
		$id = $postdata_json ['record'];
	} else {
		$record_id = getIfSet ( $postdata_json, 'record_id' );
		$id = $_SESSION ['id'];
		$record = $postdata_json ['record'];
	}
	// $id will be updated with $record added to it
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	update($conn, $record_type, $id, $record, $record_id);
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	$conn->close ();
}

?>