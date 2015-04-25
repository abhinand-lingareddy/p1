<?php
require 'session.php';
echo "login in as ",$_SESSION['username'];
header("location: user.php");
?>