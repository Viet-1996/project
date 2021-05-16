<?php session_start(); $connect = new MySQLi("localhost","root","","project");?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
	<section class="wrapper">
		<header></header>
		<nav class="navbar navbar-expand-xl bg-light navbar-light fixed-top"><?php include'menu_top.php'?></nav>
		<section class="container-fluid">
			<section class="row">
				<aside class="col-xl-1"></aside>
				<article class="col-xl-10"><?php include'get_request.php'?></article>
				<aside class="col-xl-1"></aside>
			</section>	
		</section>
		<footer></footer>
	</section>
</body>
</html>


<?php
	function addComment(){
		global $connect;
		$customer="select id from customer where username='".$_SESSION['customer']."'";
		$customer=$connect->query($customer);
		$customer=mysqli_fetch_array($customer);
		$customerId=$customer['id'];
		$productId=$_GET['id'];
		$content=$_POST['content'];
		$query="insert comments(customerId,productId,date,content) values('$customerId','$productId',now(),'$content')";
		$connect->query($query);
		return 1;
	}

	function getCommentByProductId($productId){
		global $connect;
		$query="select*from customer a join comments b on a.id=b.customerId where productId=$productId and b.status";
		$result=$connect->query($query);
		return $result;
	}

	function getProductById(){
		global $connect;
		$id=$_GET['id'];
		$query="select*from product where id=".$_GET['id'];
		$result=$connect->query($query);
		$result=mysqli_fetch_array($result);
		return $result;
	}
?>