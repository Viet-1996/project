<?php
	$query="select*from product where status=1";
	if(isset($_GET['keyword'])){
		$query.=" and name like '%".$_GET['keyword']."%'";
	}
	$result=$connect->query($query);
	include"products/show_product.php";
?>