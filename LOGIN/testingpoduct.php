<?php
include 'connect.inc.php';
$query="select * from product_data ";
$query=mysqli_query($db,$query);

while(@$row=mysqli_fetch_assoc($query)){
	echo $row['prod_id'];
	echo'<img src ='.$row['prod_image'].'>';
	

	echo $row['prod_name'];
	echo $row['prod_category'];
	echo $row['prod_description'];
	echo $row['prod_price'];
	echo $row['prod_rating'];
	echo $row['prod_available'];
	echo $row['prod_brand'];
	
}

?>