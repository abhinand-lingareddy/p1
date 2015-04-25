

<?php
require 'dbconstants.php';

try {
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;
	if(isset($_GET["user"])){
	$user=$_GET["user"];
	}
	else{
		session_start();
		$user=$_SESSION["username"];
	}
	// Create connection
	$conn = new mysqli ( $servername, $dbusername, $dbpassword, $dbname );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$stmt = $conn->prepare ( "SELECT name,email,dob,achievements FROM account where name=? " );
	$stmt->bind_param ( "s", $user );
	
	$result = $stmt->execute ();
	$stmt->bind_result ( $name, $email, $dob, $ach );
	if($stmt->fetch()){
	$json_result["name"]=$name;
	$json_result["email"]=$email;
	$json_result["dob"]=$dob;
	$json_result["achievements"]=json_decode($ach,true);
	$user_json=json_encode($json_result);
	echo $user_json;
	}
} 

catch ( Exception $e ) {
	// error
} finally{
	$conn->close ();
}

?>
