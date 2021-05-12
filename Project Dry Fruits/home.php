<?php
	global $connect;
	$query = "select*from product where status = 1";
	$result = $connect->query($query);
	include"products/show_product.php";
?>