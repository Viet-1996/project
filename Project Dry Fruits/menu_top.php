<section class="col-xl-2"></section>
<a href="?option=home"><img class="navbar-brand img-fluid" src="img/logoproject.png" width="100" height="80"></a>
<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="?option=introduce">Giới thiệu</a></li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="products/sanpham.php" id="navbardrop" data-toggle="dropdown">Sản phẩm</a>
		<section class="dropdown-menu">
		<?php
			$query="select*from producttype where status = 1";
			$producttypes=$connect->query($query);
			foreach ($producttypes as $item):
		?>
			<a class="dropdown-item" href="?option=search&producttypeid=<?=$item['id']?>"><?=$item['name']?></a>
		<?php endforeach; ?>
		</section>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="?option=news" id="navbardrop" data-toggle="dropdown">Tin tức</a>
		<section class="dropdown-menu">
			<a class="dropdown-item" href="news/khuyenmai.php">Khuyến mại</a>
			<a class="dropdown-item" href="new/tintuc.php">Tin tức</a>
		</section>
	</li>
	<li class="nav-item"><a class="nav-link" href="?option=colection" >Bộ sưu tập</a></li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="?option=contact" id="navbardrop" data-toggle="dropdown">Hỗ trợ</a>
		<section class="dropdown-menu">
			<a class="dropdown-item" href="contact/chinhsachquydinh.php">Chính sách & quy định</a>
			<a class="dropdown-item" href="contact/diachi.php">Địa chỉ</a>
			<a class="dropdown-item" href="contact/huongdanmuahang/php">Hướng dẫn mua hàng</a>
		</section>
	</li>
<?php if(empty($_SESSION['customer'])){?>
	<li class="nav-item"><a class="nav-link" href="?option=signin">Đăng nhập</a></li>
	<li class="nav-item"><a class="nav-link" href="?option=register">Đăng kí</a></li>
	<?php }else{
?>
<li class="nav-item"><section class="nav-link">
	Hello: <?=$_SESSION['customer']?> 
</section></li>
<li class="nav-item">
	<a href="?option=logout" class="nav-link">Logout</a>
</li>
<?php
	}
?>
<li class="nav-item">
	<form>
		<input type="hidden" name="option" value="search">
		<input type="search" name="keyword" required placeholder="Tìm kiếm sản phẩm">
		<input type="submit" name="Search">
	</form>
</li>
</ul>