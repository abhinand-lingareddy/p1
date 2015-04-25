<?php
require 'session.php';
require 'dbconstants.php';
try
{
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	$postdata = file_get_contents("php://input");
	$postdata_json=json_decode($postdata,true);

	    $id=$_SESSION["id"];

		$record_id=$postdata_json['record_id'];
		$record_type=$postdata_json['record_type'];


	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT $record_type FROM account where id = ?");
	$stmt->bind_param("i", $id);

	$result = $stmt->execute();
	$stmt->bind_result($entity);
	if($stmt->fetch()){
		$stmt->free_result();
		if($entity!=null){
		$entity_array=json_decode($entity,true);
		}
		array_splice($entity_array,$record_id, 1);
		$encoded_entity=json_encode($entity_array);
		$stmt = $conn->prepare("UPDATE account set $record_type = ?  where id = ?");
		$stmt->bind_param("si", $encoded_entity,$id);
		echo $encoded_entity,$id;
		$stmt->execute();
	}
	else {
		echo "failure";
	}

}

catch (Exception $e) {
	//error
}
finally{
	$conn->close();
}

?>