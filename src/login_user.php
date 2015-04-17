<?php
require 'dbconstants.php';

try
{
$servername = servername;
$username = username;
$dbpassword = dbpassword;
$dbname = dbname;

$email=$_POST["email"];
$password=$_POST["password"];
	

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$stmt = $conn->prepare("SELECT id FROM account where email=? and password=?");
$stmt->bind_param("ss", $email, $password);

$result = $stmt->execute();
$stmt->bind_result($id);
if($stmt->fetch()){
	echo "sucess",$id;
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