<?php
$loginerror1="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(!empty($username)&&!empty($password)){
		$loginform_query1="select id from users where username='$username' AND password='$password'";
		if($loginform_result1=mysqli_query($db,$loginform_query1)){
			$num_of_rows=mysqli_num_rows($loginform_result1);
			$id=mysqli_fetch_array($loginform_result1,MYSQLI_ASSOC);
			if($num_of_rows==0){
				$loginerror1=" INVALID USERNAME/PASSWORD .";
			}
			elseif($num_of_rows==1){
				$userid=$id['id'];
				
				
				$_SESSION['userid']=$userid;
				header('Location:login2.php');
				
				
			}
		}
	}
}
?>
<html>
<link rel="stylesheet" href="signup.css">




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="border:1px solid #ccc" method="POST">
  <div class="container" align="center">
    <div class="form" align="left">
	<h1>Sign in</h1>
	
    <hr>
    
    <label for="email"><b>User Name</b></label>
    <input id ="u" type="text" placeholder="Enter Email" name="username" required >

    <label for="psw"><b>Password</b></label>
    <input id="p" type="password" placeholder="Enter Password" name="password" required>
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $loginerror1; ?>
   
   

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="clearform();">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">Login</button>
    </div>
	
	</div>
  </div>
</form>
<script>
function clearform(){
	document.getElementById("u").value = "";
	document.getElementById("p").value = "";
	
}
</script>
</html>