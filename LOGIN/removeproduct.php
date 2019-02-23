<?php
include'connect.inc.php';
if(isset($_GET['prod_id'])and !empty($_GET['prod_id']))){
	$prod_id=$_GET['prod_id'];
	mysqli_query($db,"delete from product_data where prod_id=".$prod_id);
	if(isset($_SESSION['url'])) 
		$url = $_SESSION['url']; // holds url for last page visited.
	else 
		$url = "home.php"; 
	header("Location:$url");
}
?>