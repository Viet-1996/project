<img class="navbar-brand" src="logoproject.png" style="max-width: 100px;max-height: 100px">
<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="?option=introduce">Giới thiệu</a></li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="products/sanpham.php" id="navbardrop" data-toggle="dropdown">Sản phẩm</a>
		<section class="dropdown-menu">
			<a class="dropdown-item" href="products/hatsay.php">Hạt sấy</a>
			<a class="dropdown-item" href="products/hoaquasaygion.php">Hoa quả sấy giòn</a>
			<a class="dropdown-item" href="products/hoaquasaydeo.php">Hoa quả sấy dẻo</a>
			<a class="dropdown-item" href="products/trathaomoc.php">Trà thảo mộc</a>
		</section>
	</li>
	<li class="nav-item">
		<a class="nav-link dropdown-toggle" href="?option=news" id="navbardrop" data-toggle="dropdown">Tin tức</a>
		<section class="dropdown-menu">
			<a class="dropdown-item" href="news/khuyenmai.php">Khuyến mại</a>
			<a class="dropdown-item" href="new/tintuc.php">Tin tức</a>
		</section>
	</li>
	<li class="nav-item"><a class="nav-link" href="?option=colection" >Bộ sưu tập</a></li>
	<li class="nav-item">
		<a class="nav-link dropdown-toggle" href="?option=contact" id="navbardrop" data-toggle="dropdown">Hỗ trợ</a>
		<section class="dropdown-menu">
			<a class="dropdown-item" href="contact/chinhsachquydinh.php">Chính sách & quy định</a>
			<a class="dropdown-item" href="contact/diachi.php">Địa chỉ</a>
			<a class="dropdown-item" href="contact/huongdanmuahang/php">Hướng dẫn mua hàng</a>
		</section>
	</li>
<?php if(empty($_SESSION['customer'])){?>
	<li class="nav-item"><a class="nav-link" href="?option=signin">Đăng kí</a></li>
	<li class="nav-item"><a class="nav-link" href="?option=register">Đăng nhập</a></li>
	<?php }else{
?>
<li class="nav-item"><section>
	Hello: <?=$_SESSION['customer']?> 
</section></li>
<li class="nav-item"><section class="nav-link">
	<a href="?option=logout">Logout</a>
</section></li>
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