<?php
include 'connect.inc.php';
include 'core.inc.php';

if(isset($_POST['user_address'])){
	$id=@$_SESSION['userid'];
	$user_address=$_POST['user_address'];
	$address_query=mysqli_query($db,"update users set address='$user_address' where id='$id'");

	header("Location:orders.php?id=$id");
	
}

?>


<link rel="stylesheet" href="signup.css">




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="border:1px solid #ccc" method="POST">
  <div class="container" align="center">
    <div class="form" align="left">
	<h1>Enter your Address</h1>
	
    <hr>
    
    <label for="user_address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="user_address" required >
	

    <div class="clearfix" align=center>
      <button type="submit" class="signupbtn" name="submit">Confirm Order</button>
    </div>
	
	</div>
  </div>
</form>
