<?php
 include 'connect.inc.php';
 include 'core.inc.php';
 $_SESSION['url'] = $_SERVER['REQUEST_URI'];
 if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
	$user_id=$_SESSION['userid'];

	$prod_id=$_GET["prod_id"];
	$remove_from_cart_query="delete from usercart where id='$user_id' and prod_id='$prod_id'";
	$remove_from_cart_query_result = mysqli_query ($db,$remove_from_cart_query); 
	
	header('Location:home.php?cart=1');
 }
else{
	header('Location:login2.php');
	
}

?>