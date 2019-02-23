
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="homepage.css" type="text/css">


</head>
<div align=center>
<img src="ELECTRA.jpg">
</div>


<div class="topnav">
  <a href="home.php">HOME</a>
  <div class="dropdown">
    <button class="dropbtn">CATEGORIES 
    </button>
    <div class="dropdown-content">
      <a href="#">PHONE</a>
      <a href="#">COMPUTING</a>
      <a href="#">PHOTOGRAPHY</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">BRANDS
    </button>
    <div class="dropdown-content">
      <a href="#">Apple</a>
      <a href="#">DELL</a>
      <a href="#">SAMSUNG</a>
    </div>
  </div>
   
 

 <?php

 echo'<link rel="stylesheet" href="homepage.css" type="text/css">';

	if($log=="loggedin"){
		echo '<div class="dropdown" style="float:right;">
		<button class="dropbtn">'.$userquery.'
    </button>
	<div class="dropdown-content">
      <a href="#">WISHLIST</a>
      <a href="#">ORDERS</a>
      <a href="#">Account</a>
	  <a href="logout.php">Sign out</a>
	  
    </div>
    </div>';
	}
	else{
		echo '<a href="login2.php" style="float:right">Sign in</a>';
	}
	 ?>

	
 


  <a href="#" style="float:right">ABOUT US</a>
  
</div>


 
  <div class="rightcolumn">
  <div class=card ></div>
 <?php
 /* 
  echo'<link rel="stylesheet" href="homepage.css" type="text/css">';
	$product_query="select * from product_data ";
	$product_query=mysqli_query($db,$product_query);
 while(@$row=mysqli_fetch_assoc($product_query)){
	 
    echo'<div class="card" >
      <h2>'.$row['prod_name'].'</h2>
      <img class="prod_image" width=100% src ='.$row['prod_image'].'>
      <div style="height:100px;overflow:auto;">'. $row['prod_description'].'</div>
	  <h4>RS:'.$row['prod_price'].'</h4>
	  <h4>BRAND : '.$row['prod_brand'].'</h4>


    </div>';
   
	
 }  */
  ?>
</div>


</body>
</html>
