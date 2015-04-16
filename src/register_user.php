<?php 
try
{
$servername = "localhost:3307";
$username = "root";
$dbpassword = "";
$dbname = "connections";

$name=$_POST["name"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$password=$_POST["password"];

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
   // error
}

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO account (name, email,dob,password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $dob, $password);


$stmt->execute();



echo "New records created successfully,$name, $email, $dob, $password";
}

catch (Exception $e) {
  //error
}
finally{
$stmt->close();
$conn->close();
}



?>