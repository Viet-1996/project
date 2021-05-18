<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td width="20%">Hello: <?=$_SESSION['admin']?>[<a href="?option=logoutadmin" style="float: right;">Logout</a>]</td>
		<td>TRANG QUẢN TRỊ ADMIN</td>
	</tr>
	<tr>
		<td>
			<section><a href="?option=producttype" style="text-decoration: none;cursor: hand">>>>Loại sản phẩm</a></section>
			<section><a href="?option=product" style="text-decoration: none;cursor: hand">>>>Sản phẩm</a></section>
			<section>>>>Khách hàng</section>
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