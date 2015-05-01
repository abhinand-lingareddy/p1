<?php
if(isset($_GET['user']))
{
	echo "ya hoo",$_GET['user'];
	header("location: profile.php?".$_SERVER['QUERY_STRING']);
}
else{
require 'session.php';
echo "login in as ",$_SESSION['username'];	
header("location: myprofile.php");
}
?>