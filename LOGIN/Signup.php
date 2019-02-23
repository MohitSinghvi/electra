<?php
require 'connect.inc.php';
include 'core.inc.php';

$email=$username=$password="";
$error1=$error2=$error3=$error4="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(!empty($_POST['username'])&&!empty($_POST['email']&&!empty($_POST['password']))) {
			
		$username= test_input($_POST['username']);
		$email= test_input($_POST['email']);
		$password=test_input($_POST['password']);
		$password_repeat=test_input($_POST['password_repeat']);
		if($password==$password_repeat){
			if(is_data_valid($username,$email,$password)){
				$query1 = mysqli_query($db,"SELECT * FROM `users` WHERE email='$email'");
				if(!$row = mysqli_fetch_array($query1,MYSQLI_ASSOC)) {
					
					$query2 = "INSERT INTO users (username,email,password) 
							VALUES ('$username','$email','$password')"; 
					$data = mysqli_query ($db,$query2); 
					if($data) { 
						//echo "YOUR REGISTRATION IS COMPLETED..."; 
					
						header('Location: login2.php');
					}
				} 
				else {
					echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
				}
			}else{
				echo "Fill the form correctly";
			}
		}else{
			$error4="Password Mismatch";

		}
	}
	else{
		echo"fill the form completely";
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function is_data_valid($username,$email,$password){
	global $error1;
	global $error2;
	global $error3;
	
	if (@preg_match("/^[a-zA-Z][a-zA-Z]*$/",$username) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[0-9A-Za-z!@#$%]{8,12}$/', $password)){
		return true;
	}
	else {
		if(!@preg_match("/^[a-zA-Z][a-zA-Z0-9-_.]{1,20}*$/",$username)){
			
			$error1="Invalid UserName";
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$error2="Invalid Email";
			
		}
		if(!preg_match('/^[0-9A-Za-z!@#$%]{8,12}$/', $password)){
			
			$error3="Invalid password";
		}
		return false;
	}
	
}

?>






<html>
<head>
	<link rel="stylesheet" href="signup.css">
</head>


</style>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="border:1px solid #ccc" method="POST">
  <div class="container" align="center">
    <div class="form" align="left">
	<h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
    <label for="username"><b>Username</b></label><div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error1; ?></div>
    <input id="u" type="text" placeholder="Enter Username" name="username" required value="<?php echo $username?>">
    
    <label for="email"><b>Email</b></label><div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error2; ?></div>
    <input id="e" type="text" placeholder="Enter Email" name="email" required value="<?php echo $email?>">

    <label for="psw"><b>Password</b></label><div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error3; ?></div>
    <input id="p1" type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label><div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error4; ?></div>
    <input id="p2" type="password" placeholder="Repeat Password" name="password_repeat" required>
    
   
    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="clearform();">Cancel</button>
      <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    </div>
	
	</div>
  </div>
</form>

<script>
function clearform(){
	document.getElementById("u").value = "";
	document.getElementById("e").value = "";
	document.getElementById("p1").value = "";
	document.getElementById("p2").value = "";
	
}
</script>
</body>
</html>
