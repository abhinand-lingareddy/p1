<?php
require 'session.php';

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

	$stmt = $conn->prepare("SELECT name,email,dob,achievements FROM account where id=? ");
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
achievements
<form method="post" action="edit_delete_achievement.php">
<?php  

$ach_json=json_decode($ach,true);

for ($i=0;$i<count($ach_json);$i++){
	
	$title=$ach_json[$i]['title'];
	echo "<h3>title $title</h3><br>";
	
	$org=$ach_json[$i]['organisation'];
	echo "<label>organisation</label> $org<br>";
	
	$date=$ach_json[$i]['date'];
	echo "<label>date</label> $date<br>";
	
	$desc=$ach_json[$i]['description'];
	echo "<label>description</label> $desc<br>";
	
	echo "<input type='image' src='http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/24/Actions-document-edit-icon.png'  type='submit' name='edit' value='$i'>";
	echo "<input type='image' src='http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/24/Actions-edit-delete-icon.png' type='submit' name='delete' value='$i'>";
			
}


?>

</form>


<br>




Add achievement
<form action="add_achievements.php" method="post">
Title: <input type="text" name="title"><br>
Organisation: <input type="text" name="organisation"><br>
Date: <input type="text" name="date"><br>
<label >Description </label>
<textarea name="description"></textarea> 
<input type="submit">
</form>

</body>
</html>