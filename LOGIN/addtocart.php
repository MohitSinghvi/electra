<?php
 include 'connect.inc.php';
 include 'core.inc.php';
 $_SESSION['url'] = $_SERVER['REQUEST_URI'];
 if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
	$user_id=$_SESSION['userid'];

	$prod_id=$_GET["prod_id"];
	$add_to_cart_query="insert into usercart values('$user_id','$prod_id')";
	$add_to_cart_query_result = mysqli_query ($db,$add_to_cart_query); 
	echo"Item Added to cart";
	header('Location:home.php');
 }
else{
	header('Location:login2.php');
	
}

?>