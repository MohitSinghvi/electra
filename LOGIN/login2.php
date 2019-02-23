<?php
require 'connect.inc.php';
include 'core.inc.php';

if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
	if(isset($_SESSION['url'])) 
		$url = $_SESSION['url']; // holds url for last page visited.
	else 
		$url = "home.php"; // default page for 

header("Location:$url");
	
}
else{
	include 'loginform.inc.php';
	echo'<a href="signup.php">Create your Electra account</a>';
}


?>