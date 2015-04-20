<?php
require 'dbconstants.php';

try
{
$servername = servername;
$dbusername = username;
$dbpassword = dbpassword;
$dbname = dbname;

$email=$_POST["email"];
$password=$_POST["password"];
	

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$stmt = $conn->prepare("SELECT id,name FROM account where email=? and password=?");
$stmt->bind_param("ss", $email, $password);

$result = $stmt->execute();
$stmt->bind_result($id,$name);
if($stmt->fetch()){
	session_start();
	$_SESSION["username"] = $name;
	$_SESSION["id"] = $id;
	header("location: index.php");
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