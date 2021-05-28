<?php
	$query="select a.fullname,a.phonenumber as'phonenumbermember',a.address as 'addressmember',a.email as 'emailmember',b.*,c.number,d.price,d.name as 'productname',d.image from customer a join orders b on a.id=memberid join orderdetail c on b.id=c.orderid join product d on c.productid=d.id where b.id=".$_GET['id'];
	$order=mysqli_fetch_array($connect->query($query));
	$ordermethod=mysqli_fetch_array($connect->query("select*from ordermethod where id=".$order['ordermethodid']));
?>

<h1 style="text-align: center;">CHI TIẾT ĐƠN HÀNG<br>(Mã đơn hàng: <?=$order['id']?>)</h1>
<h3 style="text-align: center;">NGÀY TẠO ĐƠN: <?=$order['orderdate']?></h3>
<h2 style="text-align: center;">THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
<table class="table table-bordered table-responsive table-striped">
	<tr>
		<td style="width: 10%">Họ tên:</td>
		<td style="width: 90%"><?=$order['fullname']?></td>
	</tr>
	<tr>
		<td>Số điện thoại:</td>
		<td><?=$order['phonenumbermember']?></td>
	</tr>
	<tr>
		<td>Địa chỉ:</td>
		<td><?=$order['addressmember']?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?=$order['emailmember']?></td>
	</tr>
	<tr>
		<td>Ghi chú:</td>
		<td><?=$order['note']?></td>
	</tr>
</table>
<h2 style="text-align: center;">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<table class="table table-bordered table-responsive table-striped">
	<tbody>
		<tr>
			<td style="width: 10%">Họ tên:</td>
			<td style="width: 90%"><?=$order['name']?></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><?=$order['mobile']?></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><?=$order['address']?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?=$order['email']?></td>
		</tr>
	</tbody>
</table>
<h3>PHƯƠNG THỨC THANH TOÁN: <span style="color: red"><?=$ordermethod['name']?></span></h3>

<?php
	$query="select a.status,b.number,b.price,c.name,c.image from orders a join orderdetail b on a.id=b.orderid join product c on b.productid=c.id where a.id=".$order['id'];
	$orderdetail=$connect->query($query);
?>
<br><br>
<h2 style="text-align: center;">CÁC SẢN PHẨM ĐẶT MUA</h2>
<?php $count=1;?>
<table class="table table-bordered table-striped">
	<tr>
		<td>STT</td>
		<td>Tên sản phẩm</td>
		<td>Ảnh</td>
		<td>Giá</td>
		<td>Số lượng</td>
	</tr>
	<?php foreach($orderdetail as $item):?>
	<tr>
		<td><?=$count++?></td>
		<td><?=$item['name']?></td>
		<td><img src="../img/<?=$item['image']?>" width20%></td>
		<td><?=$item['price']?></td>
		<td><?=$item['number']?></td>
	</tr>
	<?php endforeach;?>
</table>

