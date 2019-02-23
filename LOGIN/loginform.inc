<?php
if($_SERVER[REQUEST_METHOD]=="POST"){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(!empty($username)&&!empty($password)){
		$loginform_query1="select id from users where username='$username' AND password='$password'";
		$_loginform_result1=mysqli_query($db,$loginform_query1);
		
	}
}
?>
<form action="<?php echo $current_file;?>" method="POST">
UserName:<input type="text" name="username">Password :<input type = "password" name="password" >
<input type="submit" value= "Log IN" >
</form>