<?php

?>
<form method="GET" action="home.php">
	<input type="text" placeholder="search by product name, brand or category" name="search" value="<?php echo @$search_item?>" style="width:90%; padding:10px" >
	<input type="submit" value="search" style="width:9%;padding:10px; background:#333;color:white" >
	
	
</form>