<?php


echo'
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="homepage.css" type="text/css">


</head>
<div align=center width=100%  style="width:100%;background-color:black;">
<img src="ELECTRA.jpg">
</div><br>


<div class="topnav">
  <a href="home.php" >HOME</a>
  <div class="dropdown">
    <button class="dropbtn">CATEGORIES 
    </button>
    <div class="dropdown-content">
      <a href="home.php?prod_category=phone">PHONE</a>
      <a href="home.php?prod_category=computing">COMPUTING</a>
      <a href="home.php?prod_category=photography">PHOTOGRAPHY</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">POPULAR BRANDS
    </button>
    <div class="dropdown-content">
      <a href="home.php?prod_brand=apple">Apple</a>
      <a href="home.php?prod_brand=dell">DELL</a>
      <a href="home.php?prod_brand=Samsung">SAMSUNG</a>
    </div>
  </div>
';   

	if($log=="loggedin"){
		echo '<div class="dropdown" style="float:right;">
		<button class="dropbtn" >'.strtoupper($userquery).'
		</button>
		<div class="dropdown-content">';
		if($id!=1) {
		  echo'<a href="home.php?cart=1">🛒CART</a>';
		}
		else{
			echo'<a href="productupload.php">UPLOAD PRODUCT</a>';
		}	
		  echo'<a href="home.php?order=1">ORDERS</a>
		  <a href="#">Account</a>
		  <a href="logout.php">Sign out</a>
		</div>
		</div>';
	}
	else{
		echo '<a href="login2.php" style="float:right">Sign in</a>';
	}
	 

	
 
echo'
	
  <a href="aboutus.php" style="float:right">ABOUT US</a>
  
</div>
';
include'search.php';
//----------------------------------------------------------------------------
//showItems();
if($showing=="one"){
	showCurrentItem();
}
else{
	showItems();
	
}





function showCurrentItem(){
	global $show,$db,$product_query,$cart_total,$id,$log;
	$product_query=mysqli_query($db,$product_query);
	while(@$row=mysqli_fetch_assoc($product_query)){
		
		
		
		$prod_id=$row['prod_id'];
		$is_added_to_cart="select id from usercart where id='$id' and prod_id='$prod_id'";
		$is_added_to_cart1=mysqli_query($db,$is_added_to_cart);
		$is_added_to_cartcount=mysqli_num_rows($is_added_to_cart1);
		
		if($log=="loggedin"){
			if($is_added_to_cartcount!=0 ){
				$cart_message= "✓ ADDED";
			}
			elseif($is_added_to_cartcount==0){
				$cart_message= "🛒 Add to cart";
			}
		}
		else {$cart_message= "🛒 Add to cart";	}
		echo'<div class=card style="width:100%" >
		  
		  <h2>'.$row['prod_name'].'</h2>
		  <h4>by '.strtoupper($row['prod_brand']).'</h4>
		  <div  style="max-width:300px;">
		  <img class="prod_image" src ='.$row['prod_image'].' style="float: left;width:100%">
		  </div>
		  <div style=";"  > '. $row['prod_description'].'</div>
		  <h2>₹'.$row['prod_price'].'/- only</h2>
		  
		  ';
		if($show!="YOUR CART" and $id!=1){
			  echo'	
			  <div style="clear:both;" align="center" >
			  <form method="GET" action="addtocart.php?">
			  <input type="hidden" name="prod_id" value='.$row['prod_id'].' >
			  <input type="submit" style="width:33%;background-color: #333;color:white;height:50px;" value="'.$cart_message.'" >
				</form></div>';
				
		}
		
	
		echo'    </div>';
		
	   
		
	 }  
	
	
}








function showItems(){	
	global $show,$db,$product_query,$cart_total,$id,$log;
	if($show!=""){
	echo'   
	
	<p align=center style="width:100%;background-color:#333;color:white;padding:10px;">'.$show.'</p>';
	}
	if($show=="YOUR CART"){
		if(!empty($cart_total)){
			echo'
			<div align=center>
				<p>TOTAL AMOUNT: ₹ '.number_format($cart_total).'</p><div><a href="getAddress.php" style="background-color:black;padding:10px;color:white;text-decoration:none;">ORDER NOW</a><div><br>
			</div>
			';
		}
		else{
			echo'<div align=center>
				<p>Your 🛒cart is empty! <a href="home.php">Start shopping</a>!!</p>	
			</div>';
		}	
	}

	
	echo' <div class="rightcolumn">
	';
	
	$product_query=mysqli_query($db,$product_query);
	
	while(@$row=mysqli_fetch_assoc($product_query)){
		
		if($log=="loggedin"){
			$prod_id=$row['prod_id'];
			$is_added_to_cart="select id from usercart where id='$id' and prod_id='$prod_id'";
			$is_added_to_cart1=mysqli_query($db,$is_added_to_cart);
			$is_added_to_cartcount=mysqli_num_rows($is_added_to_cart1);
		
			if($is_added_to_cartcount!=0 and $log="loggedin"){
				$cart_message= "✓ ADDED";
			}
			else{
				$cart_message= "🛒Add to cart";
			}
		}
		else{
			$cart_message="🛒Add to cart";
		}
		
		echo'<a class="card_anchor" href="home.php?prod_id='.$row['prod_id'].'">';
		
		echo'<div class=card align=center>
		
			
		
		  <h2>'.$row['prod_name'].'</h2>
		  <h4>'.strtoupper($row['prod_brand']).'</h4>
		  <div width=100% style="height:200px"><img class="prod_image" src ='.$row['prod_image'].' style="width:100%">
		 </div>
		  <h4>₹'.number_format($row['prod_price']).'</h4>
		  
		 ';
		 /* if($id==1){
			 echo"by ".$row['id'];
			 
		 } */
		 
		if($show!="YOUR CART" and $id!=1 and !isset($_GET['order'])){
			
			  echo'	  
			  <form method="GET" action="addtocart.php?">
			  <input type="hidden" name="prod_id" value='.$row['prod_id'].' >
			  <input type="submit" style="width:100%;background-color: #333;color:white;height:50px;" value="'.$cart_message.'" >
				</form>';
		}
		elseif($show=="YOUR CART" and $id!=1){
			  $cart_message="REMOVE FROM CART";
			  echo'<form method="GET" action="removefromcart.php"?>
			  <input type="hidden" name="prod_id" value='.$row['prod_id'].' >
			  <input type="submit" style="width:100%;background-color: #333;color:white;height:50px;" value="'.$cart_message.'" >
				</form>';
			  
		}
		elseif(@isset($_GET['order']) and $id==1){
			$orderer_id=@$row['id'];
			$get_orderer="select username,address from users where id= $orderer_id";
			$get_orderer=mysqli_query($db,$get_orderer);
			$get_orderer=mysqli_fetch_assoc($get_orderer);
			echo"Ordered by - ".$get_orderer['username']."<br>address : ".$get_orderer['address'];
			
		}
		elseif($id==1 and !@isset($_GET['order']) ){
			$cart_message="REMOVE FROM STORE";
			 echo'	  
			  <form method="GET" action="removeproduct.php?'.$prod_id.'">
			  <input type="hidden" name="prod_id" value='.$row['prod_id'].' >
			  <input type="submit" style="width:100%;background-color: #333;color:white;height:50px;" value="'.$cart_message.'" >
				</form>';
		}
		
		
			
		echo'    </div>';
		echo'</a>';
	   
		
	 }  
	echo" 
	</div>
	


	";
}

echo"
</body>
</html>";

?>
