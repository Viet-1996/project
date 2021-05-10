<a href="?option=introduce">Giới thiệu</a>
<a href="?option=news">Tin tức</a>
<a href="?option=colection">Bộ sưu tập</a>
<a href="?option=contact">Hỗ trợ</a>
<?php if(empty($_SESSION['customer'])){?>
	<a href="?option=signin">Đăng kí</a>
	<a href="?option=register">Đăng nhập</a>
	<?php }else{
?>
<section style="float: left;width: 16.6667%; height: 20px; border:green thin solid; box-sizing: border-box;">
	Hello: <?=$_SESSION['customer']?> 
</section>
<section style="float: left;width: 16.6667%; height: 20px; border:green thin solid; box-sizing: border-box;">
	<a href="?option=logout">Logout</a>
</section>
<?php
	}
?>