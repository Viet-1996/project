<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$connect->query("delete from orderdetail where orderid=$id");
		$connect->query("delete from orders where id=$id");
		header("location: ?option=order&status=4");
	}
?>

<?php
	$status=$_GET['status'];
	$query="select*from orders where status=$status";
	$result=$connect->query($query);
?>
<h1 style="text-align: center;">ĐƠN HÀNG <?=$status==1?'CHƯA XỬ LÍ':($status==2?'ĐANG XỬ LÍ':($status==3?'ĐÃ XỬ LÍ':'HỦY'))?>
</h1>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Ngày tạo</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		<<?php $count=1 ?>
		<?php foreach ($result as $item): ?>
			<tr>
				<td><?=$count++?></td>
				<td><?=$item['id']?></td>
				<td><?=$item['orderdate']?></td>
				<td><a href="?option=orderdetail&id=<?=$item['id']?>">Chi tiết đơn hàng</a> | <a style="display:<?$status==4?'block':'none';?>" onclick="return confirm('Are you sure');" href="?option=order&id=<?=$item['id']?>">Xóa</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>