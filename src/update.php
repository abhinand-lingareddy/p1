<?php
require 'session.php';
require 'dbconstants.php';
function getIfSet($json, $key) {
	if (isset ( $json [$key] )) {
		return $json [$key];
	}
	return null;
}
try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	$postdata = file_get_contents ( "php://input" );
	$postdata_json = json_decode ( $postdata, true );
	
	$record_type =$postdata_json['record_type'] ;
	
	if ($record_type == "pendingrequests") {
		$record =$_SESSION['id'];
		$id = $postdata_json[ 'record' ];
	} else {
		$record_id = getIfSet($postdata_json,'record_id');
		$id = $_SESSION['id' ];
		$record =$postdata_json['record'];
		var_dump($record_id);
	}
	
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$stmt = $conn->prepare ( "SELECT $record_type FROM account where id = ?" );
	$stmt->bind_param ( "i" , $id );
	
	$result = $stmt->execute ();
	$stmt->bind_result ( $entity );
	if ($stmt->fetch ()) {
		$stmt->free_result ();
		$entity_array = json_decode ( $entity, true );
		if ($record_id ===NULL) {
			array_push ( $entity_array, $record );
				
		} else {
			echo "correct";
			$entity_array [$record_id] = $record;
		}
		$encoded_entity = json_encode ( $entity_array,true);
		
		$stmt = $conn->prepare ( "UPDATE account set $record_type = ?  where id = ?" );
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