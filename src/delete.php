<?php
require 'session.php';
require 'dbconstants.php';
function getIfSet($json, $key) {
	if (isset ( $json [$key] )) {
		return $json [$key];
	}
	return null;
}
function delete($conn,$record_type,$id,$record,$record_id) {
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
			if ($entity !== NULL) {
				$entity_array = json_decode ( $entity, true );
			}
			if ($record_id === NULL) {
				$record_id = array_search ( $record, $entity_array );
			}
			array_splice ( $entity_array, $record_id, 1 );
			$encoded_entity = json_encode ( $entity_array );
			$stmt = $conn->prepare ( "UPDATE account set $record_type = ?  where id = ?" );
			if ($stmt === false) {
				throw new Exception ( "error:db query error" );
			}
			$stmt->bind_param ( "si", $encoded_entity, $id );
			$stmt->execute ();
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
	$postdata = file_get_contents ( "php://input" );
	$postdata_json = json_decode ( $postdata, true );
	$record_type = $postdata_json ['record_type'];
	$record_id = getIfSet ( $postdata_json, 'record_id' );
	$session = getIfSet ( $postdata_json, 'session' );
	if ($session == null) {
		$id = getIfSet ( $postdata_json, 'record' );
		$record = $_SESSION ["id"];
	} else {
		$record = getIfSet ( $postdata_json, 'record' );
		$id = $_SESSION ["id"];
	}
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		throw new Exception ( "error:db connection failed" );
	}
	delete($conn, $record_type, $id, $record, $record_id);
} 

catch ( Exception $e ) {
	echo $e->getMessage ();
} finally{
	
	$conn->close ();
}

?>