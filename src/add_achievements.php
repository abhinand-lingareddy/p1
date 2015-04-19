<?php
require 'dbconstants.php';
session_start();
if(!isset($_SESSION['id']))
{
	header("location: login.php");
}
try
{
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;

	$new_ach["title"]=$_POST["title"];
	$new_ach["organisation"]=$_POST["organisation"];
	$new_ach["date"]=$_POST["date"];
	$new_ach["description"]=$_POST["description"];
	$id=$_SESSION["id"];


	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT achievements FROM account where id = ?");
	$stmt->bind_param("i", $id);

	$result = $stmt->execute();
	$stmt->bind_result($achievements);
	if($stmt->fetch()){
		$stmt->free_result();
		if($achievements!=null){
		$ach_array=json_decode($achievements,true);
		}
		else{
			$ach_array=array();
		}
		array_push($ach_array,$new_ach );
		$encoded_achievements=json_encode($ach_array);
		$stmt = $conn->prepare("UPDATE account set achievements = ?  where id = ?");
		$stmt->bind_param("si", $encoded_achievements,$id);
		$stmt->execute();
		header("location: profile.php");
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