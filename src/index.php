<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location: login.php");
}
echo "login in as ",$_SESSION['username'];
header("location: profile.php");
?>