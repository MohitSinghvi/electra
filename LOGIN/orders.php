<?php
include'connect.inc.php';
include 'core.inc.php';
$product_names="";
if(isset($_GET['id'])){
	if(!empty($_GET['id'])){
		$id=$_GET['id'];
		
		$orderer_email="select email from users where id='$id'";
		$orderer_email=mysqli_query($db,$orderer_email);
		$orderer_email_val=mysqli_fetch_assoc($orderer_email);
		$to=$orderer_email_val['email'];
		
		$cart_product="select prod_id from usercart where id='$id'";
		$cart_product=mysqli_query($db,$cart_product);
		
		while(@$cart_product_row=mysqli_fetch_assoc($cart_product)){
			$prod_id=$cart_product_row['prod_id'];
			$order_product="insert into orders values('$id','$prod_id')";
			$order_product=mysqli_query($db,$order_product);
			$remove_from_cart_query="delete from usercart where id='$id' and prod_id='$prod_id'";
			$remove_from_cart_query_result = mysqli_query ($db,$remove_from_cart_query); 
			
			
			$product_name="select prod_name from product_data where prod_id='$prod_id'";
			$product_name=mysqli_query($db,$product_name);
			$product_name_val=mysqli_fetch_assoc($product_name);
			if($product_names!=""){
				$product_names=$product_names.", ".$product_name_val['prod_name'];
			}
			else{
				$product_names=$product_names." ".$product_name_val['prod_name'];
			}

		}
			$from = "electravit1@gmail.com";
			//$to = "msinghvi16@gmail.com";
			$subject = " ELECTRA : Order confirmed!";
			//$message = "PHP mail works just fine";
			$message = "Your Order for => ".$product_names." has been confirmed! Your order will be deliverd to you within one week. Thank You - Team Electra.";
			$headers = "From:" . $from;
			mail($to,$subject,$message, $headers);
			//echo "The email message was sent.";
			echo $product_names;
			header("Location:home.php?order=1");
		
		
		
	}
}
else{
	header("Location:home.php?order=1");
}

?>