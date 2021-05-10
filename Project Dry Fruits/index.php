<?php session_start(); $connect = new MySQLi("localhost","root","","project");?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<section class="wrapper">
		<header><?php include'header.php'?></header>
		<nav><?php include'menu_top.php'?></nav>
		<section class="main">
			<aside><?php include'left.php';?></aside>
			<article><?php include'get_request.php'?></article>
			<aside><?php include'right.php'?></aside>
		</section>
		<footer><?php include'footer.php'?></footer>
	</section>
</body>
</html>