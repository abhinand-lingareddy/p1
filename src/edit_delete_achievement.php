<?php
require 'session.php';
require 'dbconstants.php';
if(isset($_POST['edit'])){
	try
	{
		$servername = servername;
		$dbusername = username;
		$dbpassword = dbpassword;
		$dbname = dbname;
	
		$id=$_SESSION["id"];
	
		$record_id=$_POST['edit'];
	
	
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
				header("location: profile.php");
			}
			$edit_record=$ach_array[$record_id];
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
echo $_POST['edit'];
}else if(isset($_POST['delete'])){
	try
	{
		$servername = servername;
		$dbusername = username;
		$dbpassword = dbpassword;
		$dbname = dbname;
	
		$id=$_SESSION["id"];
		
		$record_id=$_POST['delete'];
	
	
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
				header("location: profile.php");
			}
			array_splice($ach_array,$record_id, 1);
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
}
else{
	header("location: profile.php");
}


?>
<body>
Add achievement
<form action="add_achievements.php" method="post">
Title: <input type="text" name="title" value=<?php echo $edit_record["title"]?>> <br>
Organisation: <input type="text" name="organisation" value=<?php echo $edit_record["organisation"] ?> ><br>
Date: <input type="text" name="date" value=<?php echo $edit_record["date"] ?>> <br>
<label >Description </label>
<textarea name="description" ><?php echo $edit_record["description"]?></textarea> 
<input type="submit" value="update">
<input type="hidden" name="record_id" value="<?php echo $record_id; ?>">
</form>
</body>