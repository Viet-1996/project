<?php
	$query="select*from product where status=1";
	if(isset($_GET['brandid'])){
		$query.=" and brandid=".$_GET['brandid'];
	}
	if(isset($_GET['keyword'])){
		$query.=" and name like '%".$_GET['keyword']."%'";
	}
	if(isset($_GET['start'])){
		$start=$_GET['start'];
		$end=$_GET['end'];
		if($end!=0)
			$query.=" and price>=$start and price<=$end";
		else
			$query.=" and price>=$start";
	}
	$result=$connect->query($query);
	include"show_product.php";
?>