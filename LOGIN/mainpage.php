<?php
include 'connect.inc.php';


$query="SELECT * FROM users";
$result=mysqli_query($db,$query);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		
		echo"<div><b> username = </b>".$row["username"]." email = ".$row["email"]."<br>"."</div>";
		
	}
	
}else{
	
}

?>
<html>
<head>
<style>
div{
	height:100px;
	width:200px;
	color:white;
	background:red;
	padding:10px;
	margin:10px;
	float:left;
}
</style>
</head>

</html>