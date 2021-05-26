<?php
	$query="select*from product";
	$result=$connect->query($query);
?>
<h1 style="text-align: center;">Sản phẩm</h1>
<section style="text-align: center;margin-bottom: 10px;"><a href="?option=addproduct" style="background-color: #eee; text-decoration: none; padding: 5px;border-radius: 5px">Thêm sản phẩm</a></section>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="text-align: center;">
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
				<td><img src="../img/<?=$item['image']?>" width=25%></td>
				<td><?=$item['description']?></td>
				<td><?=$item['producttypeid']?></td>
				<td><?=$item['status']==1?'Active':'InActive'?></td>
				<td><a href="?option=updateproduct&id=<?=$item['id']?>">Chỉnh sửa</a> | <a onclick="return confirm('Are you sure');" href="?option=deleteproduct&id=<?=$item['id']?>">Xóa</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>