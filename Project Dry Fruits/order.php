<?php
	$query="select*from customer where username='".$_SESSION['customer']."'";
	$customer=mysqli_fetch_array($connect->query($query));
?>

<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$note=$_POST['note'];
		$ordermethodid=$_POST['ordermethodid'];
		$memberid=$customer['id'];
		$query="insert orders(ordermethodid, memberid, name, address, mobile, email, note) values('$ordermethodid', '$memberid', '$name', '$address', '$mobile', '$email', '$note')";
		$connect->query($query);
		$query="select id from orders order by id desc limit 1";
		$orderid=mysqli_fetch_array($connect->query($query))['id'];
		foreach($_SESSION['cart'] as $key=>$value){
			$product=$key;
			$number=$value;
			$query="select price from product where id=$key";
			$price=mysqli_fetch_array($connect->query($query))['price'];
			$query="insert orderdetail values($productid,$orderid,$number,$price";
			$connect->query($query);
		}
		unset($_SESSION['cart']);
		header('location: ?option=ordersuccess');
	}
?>


<br>
<h1>ĐẶT HÀNG</h1>
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<center><table>
	<form method="post">
		<tr>
			<td style="float: right;">Họ tên: </td>
			<td><input type="text" name="name" value="<?=$customer['fullname']?>"></td>
		</tr>
		<tr>
			<td style="float:right;" >Điện thoại: </td>
			<td><input type="tel" name="mobile" value="<?=$customer['phonenumber']?>"></td>
		</tr>
		<tr>
			<td style="float: right;">Địa chỉ: </td>
			<td><input type="text" name="address" value="<?=$customer['address']?>"></textarea></td>
		</tr>
		<tr>
			<td style="float: right;">Email: </td>
			<td><input type="email" name="email" value="<?=$customer['email']?>"></td>
		</tr>
		<tr>
			<td style="float: right;">Ghi chú: </td>
			<td><input type="text" name="note"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">Chọn phương thức thanh toán</td>
		</tr>
		<tr>
			<?php
				$query="select*from ordermethod where status=1";
				$result=$connect->query($query);
			?>
			<td colspan="2">
				<center><select name="ordermethodid">
					<?php foreach ($result as $item):?>
						<option value="<?=$item['id']?>"><?=$item['name']?></option>
					<?php endforeach;?>
				</select></center>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Đặt hàng" class="btn-success"></td>
		</tr>
	</form>
</table></center>