<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location: login.php");
}
require 'dbconstants.php';

try
{
	$servername = servername;
	$dbusername = username;
	$dbpassword = dbpassword;
	$dbname = dbname;

	$username=$_SESSION["username"];
	$id=$_SESSION["id"];
	echo "id ",$id;


	// Create connection
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT name,email,dob,achivements FROM account where id=? ");
	$stmt->bind_param("i", $id);

	$result = $stmt->execute();
	$stmt->bind_result($name,$email,$dob,$ach);
	if(!$stmt->fetch()){
		session_destroy();
		header("location: login.php");
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
<html>
<body>
username<?php echo $username?><br>
email<?php echo $email?><br>
dob<?php echo $dob?><br>
achivements<?php echo $ach?><br>

</body>
</html>