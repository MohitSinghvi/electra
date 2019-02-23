<?php

require 'connect.inc.php';
include 'core.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$prod_name=$_POST['prod_name'];
	$prod_category=$_POST['prod_category'];
	$prod_brand=$_POST['prod_brand'];
	$prod_description=$_POST['prod_description'];
	$prod_price=$_POST['prod_price'];
	$prod_image=$_POST['prod_image'];

	$prod_imagename=$_FILES["prod_image"]["name"];

	
	$productupload="INSERT INTO product_data (prod_name,prod_category,prod_description,prod_brand,prod_price,prod_image,prod_rating,prod_available) 
							VALUES ('$prod_name','$prod_category','$prod_description','$prod_brand','$prod_price','$prod_imagename',0,1)"; 
	
	$productupload=mysqli_query($db,$productupload);
	if($productupload){
		
		header('Location: home.php');
	}
	
	
	
}





?>



<link rel="stylesheet" href="signup.css">




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" style="border:1px solid #ccc" method="POST">
  <div class="container" align="center">
    <div class="form" align="left">
	<h1>Upload the product</h1>
	
    <hr>
    
    <label for="prod_name"><b>Product Name</b></label>
    <input type="text" placeholder="Enter the name of the product" name="prod_name" required >
	
	<label for="prod_category"><b>Product Category</b></label>
    <input type="text" placeholder="Enter category " name="prod_category" required >
	
	<label for="prod_brand"><b>Product Brand</b></label>
    <input type="text" placeholder="Enter the name of Brand" name="prod_brand" required >
	
	
	<label for="prod_description"><b>Description</b></label>
    <input type="text" placeholder="Enter the prod_description" name="prod_description" required >
	
	<label for="prod_price"><b>Price</b></label>
    <input type="text" placeholder="Enter the prod_price " name="prod_price" required >
	

<label for="prod_image"><b>Product Image</b></label>	
	<input name="prod_image" type="file">

	
	
   
   

    <div class="clearfix" align=center>
      <button type="submit" class="signupbtn" name="submit">upload</button>
    </div>
	
	</div>
  </div>
</form>
