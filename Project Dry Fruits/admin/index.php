<?php session_start(); $connect = new MySQLi("localhost","root","","project"); mysqli_set_charset($connect,'UTF8');?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
	if(empty($_SESSION['admin'])){
		include"loginadmin.php";
	}else{
		include"cpanel.php";
	}
?>
</body>
</html>