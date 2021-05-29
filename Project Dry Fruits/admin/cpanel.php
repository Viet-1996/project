<?php
	$ChuaXuLi=mysqli_num_rows($connect->query("select*from orders where status=1"));
	$DangXuLi=mysqli_num_rows($connect->query("select*from orders where status=2"));
	$DaXuLi=mysqli_num_rows($connect->query("select*from orders where status=3"));
	$Huy=mysqli_num_rows($connect->query("select*from orders where status=4"));
?>

<table class="table table-responsive table-bordered">
	<tr style="text-align: center;">
		<td width="15%" height="30px">Xin chào: <?=$_SESSION['admin']?><a href="?option=logoutadmin" style="float: right;text-decoration: none;">[Logout]</a></td>
		<td>TRANG QUẢN TRỊ ADMIN</td>
	</tr>
	<tr>
		<td>
			<section style="margin-top: 20px"><a href="?option=producttype" style="text-decoration: none;cursor: hand">>>>Loại sản phẩm</a></section>
			<section style="margin-top: 20px"><a href="?option=product" style="text-decoration: none;cursor: hand">>>>Sản phẩm</a></section>
			<section style="margin-top: 20px">>>>Đơn hàng</section>
			<section><a href="?option=order&status=1" style="text-decoration: none;cursor: hand">&nbsp;&nbsp;>>Đơn hàng chưa xử lí[<span style="color: red"><?=$ChuaXuLi?></span>]</a></section>
			<section><a href="?option=order&status=2" style="text-decoration: none;cursor: hand">&nbsp;&nbsp;>>Đơn hàng đang xử lí[<span style="color: red"><?=$DangXuLi?></span>]</a></section>
			<section><a href="?option=order&status=3" style="text-decoration: none;cursor: hand">&nbsp;&nbsp;>>Đơn hàng đã xử lí[<span style="color: red"><?=$DaXuLi?></span>]</a></section>
			<section><a href="?option=order&status=4" style="text-decoration: none;cursor: hand">&nbsp;&nbsp;>>Đơn hàng đã hủy[<span style="color: red"><?=$Huy?></span>]</a></section>
		</td>
		<td>
			<?php
				if(isset($_GET['option'])){
					switch ($_GET['option']) {
						case 'product':
							include"product.php";
							break;
						case 'addproduct':
							include"addproduct.php";
							break;
						case 'updateproduct':
							include"updateproduct.php";
							break;
						case 'deleteproduct':
							$query="select*from product where productid=".$_GET['id'];
							$result=$connect->query($query);
							if(mysqli_num_rows($result)!=0){
								$connect->query("update product set status=0 where id=".$_GET['id']);
							} else{
								$connect->query("delete from product where id=".$_GET['id']);
								unlink("../img/".$_GET['image']);
							}
							header("location: ?option=product");
							break;
						case 'producttype':
							include"producttype.php";
							break;
						case 'addproducttype':
							include"addproducttype.php";
							break;
						case'updateproducttype':
							include"updateproducttype.php";
							break;
						case'deleteproducttype':
							$query="select*from product where producttypeid=".$_GET['id'];
							$result=$connect->query($query);
							if(mysqli_num_rows($result)!=0){
								$connect->query("update producttype set status=0 where id=".$_GET['id']);
							} else{
								$connect->query("delete from producttype where id=".$_GET['id']);
							}
							header("location: ?option=producttype");
							break;
						case 'order':
							include"showorder.php";
							break;
						case 'orderdetail':
							include"orderdetail.php";
							break;
						case'logoutadmin':
							unset($_SESSION['admin']);
							header("location: .");
							break;
					}
				}
			?>
		</td>
	</tr>
</table>