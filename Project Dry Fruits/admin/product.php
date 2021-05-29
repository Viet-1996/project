<?php
	$query="select*from product";
	$result=$connect->query($query);
?>
<h1 style="text-align: center;">Sản phẩm</h1>
<section class="btn btn-success" style="margin-left: 43%;"><a href="?option=addproduct" style="color:white;">Thêm sản phẩm</a></section>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th>Giá cả</th>
			<th>Ảnh</th>
			<th>Mô tả</th>
			<th>Loại sản phẩm</th>
			<th>Trạng thái</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $item): ?>
			<tr>
				<td><?=$item['id']?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['price']?></td>
				<td><img src="../img/<?=$item['image']?>"></td>
				<td><?=$item['description']?></td>
				<td><?=$item['producttypeid']?></td>
				<td><?=$item['status']==1?'Active':'InActive'?></td>
				<td><a href="?option=updateproduct&id=<?=$item['id']?>">Chỉnh sửa</a> | <a onclick="return confirm('Are you sure');" href="?option=deleteproduct&id=<?=$item['id']?>">Xóa</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>