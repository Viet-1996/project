<?php
	$query="select*from product";
	$result=$connect->query($query);
?>
<h1>Sản phẩm</h1>
<section style="text-align: center;margin-bottom: 10px;"><a href="?option=addproduct" style="background-color: #eee; text-decoration: none; padding: 5px;border-radius: 5px">Add Product</a></section>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Description</th>
			<th>Product Type Id</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $item): ?>
			<tr>
				<td><?=$item['id']?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['price']?></td>
				<td><?=$item['image']?></td>
				<td><?=$item['description']?></td>
				<td><?=$item['producttypeid']?></td>
				<td><?=$item['status']==1?'Active':'InActive'?></td>
				<td><a href="?option=updateproduct&id=<?=$item['id']?>">Update</a> | <a onclick="return confirm('Are you sure');" href="?option=deleteproduct&id=<?=$item['id']?>">Delete</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>