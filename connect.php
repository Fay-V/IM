<?php 
	$connection = new mysqli('localhost', 'root','','catalog');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>