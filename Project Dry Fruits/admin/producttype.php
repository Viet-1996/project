<?php
	$query="select*from producttype";
	$result=$connect->query($query);
?>
<h1 style="text-align: center;">Loại sản phẩm</h1>
<section style="text-align: center;margin-bottom: 10px;"><a href="?option=addproducttype" style="background-color: #eee; text-decoration: none; padding: 5px;border-radius: 5px">Thêm loại sản phẩm</a></section>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th>Trạng thái</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $item): ?>
			<tr style="text-align: center;">
				<td><?=$item['id']?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['status']==1?'Active':'InActive'?></td>
				<td><a href="?option=updateproducttype&id=<?=$item['id']?>">Chỉnh sửa</a> | <a onclick="return confirm('Are you sure');" href="?option=deleteproducttype&id=<?=$item['id']?>">Xóa</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>