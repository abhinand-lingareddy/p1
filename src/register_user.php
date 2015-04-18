<?php
include 'dbconstants.php'; 
try
{
$servername = servername;
$dbusername = username;
$dbpassword = dbpassword;
$dbname = dbname;

$name=$_POST["name"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$password=$_POST["password"];

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
   // error
}

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO account (name, email,dob,password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $dob, $password);


$stmt->execute();
header("location: login.php");

}

catch (Exception $e) {
  //error
}
finally{
$stmt->close();
$conn->close();
}



?>