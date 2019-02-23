<html>
<head>
<title>Electra Home</title>
<link rel="icon" href="myfavicon.png">
</head>
</html>
<?php
require 'connect.inc.php';
include 'core.inc.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=@$_SESSION['userid'];

if(isset($_GET['prod_id'])){
	$showing="one";
	$prod_id=$_GET['prod_id'];
	$product_query="select *from product_data where prod_id='$prod_id'";
	$show="CATEGORY : ".strtoupper("Specifications");
}
else{
	$showing="many";
	if(isset($_GET['prod_category'])){
		$prod_category=$_GET['prod_category'];
		$product_query="select *from product_data where prod_category='$prod_category'";
		$show="CATEGORY : ".strtoupper($prod_category);
	}
	elseif(isset($_GET['prod_brand'])){
		$prod_brand=$_GET['prod_brand'];
		$product_query="select *from product_data where prod_brand='$prod_brand'";
		$show="BRAND : ".strtoupper($prod_brand);
	}
	elseif(isset($_GET['cart']) and isset($_SESSION['userid'])){
	//	$prod_brand=$_GET['prod_brand'];
		$product_query="select *from product_data where prod_id in (select prod_id from usercart where id='$id') ";
		$cart_total=mysqli_query($db,"select sum(prod_price) from product_data where prod_id in (select prod_id from usercart where id='$id')");
		$cart_total=mysqli_fetch_assoc($cart_total);
		$cart_total=$cart_total['sum(prod_price)'];
		$show="YOUR CART";
	}
	elseif(isset($_GET['order'])){
		if($id!=1){
			$product_query="select * from product_data  where prod_id in (select prod_id from orders where id='$id')";
			$bill_total=mysqli_query($db,"select sum(prod_price) from product_data where prod_id in (select prod_id from orders where id='$id')");
			$bill_total=mysqli_fetch_assoc($bill_total);
			$bill_amount=$bill_total['sum(prod_price)'];
		}
		else{
			$product_query="select p.prod_id,prod_name,prod_price,prod_image,prod_description,prod_brand,prod_category,id from product_data as p ,orders as o  where p.prod_id =o.prod_id";
			$bill_total=mysqli_query($db,"select sum(prod_price) from product_data where prod_id in (select prod_id from orders)");
			$bill_total=mysqli_fetch_assoc($bill_total);
			$bill_amount=$bill_total['sum(prod_price)'];
			
			
		}
		if($bill_amount){
			$show="ORDERS : TOTAL AMOUNT : ".$bill_amount;
		}
		else{
			if($id!=1){
				$show="You have not ordered anything yet.";
			}
			else{
				$show="You don't have any orders.";
			}
		}
	}
	elseif(isset($_GET['search']) and !empty($_GET['search'])){
		$search_item=$_GET['search'];
		//echo $search_item;
		$search_category="select prod_id from product_data where prod_category='$search_item'";
		$search_category=mysqli_query($db,$search_category);
		$search_brand="select prod_id from product_data where prod_brand='$search_item'";
		$search_brand=mysqli_query($db,$search_brand);
		$search_product="select prod_id from product_data where prod_name='$search_item'";
		$search_product=mysqli_query($db,$search_product);
		
		if(mysqli_num_rows($search_category)!=0){
			$product_query="select *from product_data where prod_category='$search_item'";
		}
		elseif(mysqli_num_rows($search_brand)!=0){
			$product_query="select *from product_data where prod_brand='$search_item'";
		}
		elseif(mysqli_num_rows($search_product)!=0){
			$product_query="select *from product_data where prod_name='$search_item'";
		}
		else{
			$product_query="select * from product_data ";
		}
		
	}
	else{
		$product_query="select * from product_data ";
		$show="";
	}
	
}
if(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])){
	$id=$_SESSION['userid'];
	$userquery="select username from users where id= '$id' ";
	$userquery=mysqli_query($db,$userquery);
	$userquery=mysqli_fetch_array($userquery,MYSQLI_ASSOC);
	$userquery=$userquery['username'];
	$log="loggedin";

	
	include'hometest.php';
}
else{
	
	
	$log="loggedout";
	
	include'hometest.php';
	
	
	
}

?>

<script>

</script>

