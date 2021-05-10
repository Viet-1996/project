<?php
	$query = "select * from product where status = 1";
	$result = $connect->query($query);
	include"show_product.php";
?>
