<?php
	$query="select*from product where status=1";
	if(isset($_GET['keyword'])){
		$query.=" and name like '%".$_GET['keyword']."%'";
	}
	if(isset($_GET['producttypeid'])){
		$query.=" and producttypeid=".$_GET['producttypeid'];
	}
	$result=$connect->query($query);
	if(mysqli_num_rows($result)==0){
		echo"<br>";
		echo"Không có sản phẩm nào";
	} else{
		include"products/show_product.php";
	}	
?>