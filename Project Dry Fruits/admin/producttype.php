<?php
	$query="select*from producttype";
	$result=$connect->query($query);
?>
<h1>Loại sản phẩm</h1>
<section style="text-align: center;margin-bottom: 10px;"><a href="?option=addproducttype" style="background-color: #eee; text-decoration: none; padding: 5px;border-radius: 5px">Add Producttype</a></section>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $item): ?>
			<tr>
				<td><?=$item['id']?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['status']==1?'Active':'InActive'?></td>
				<td><a href="?option=updateproducttype&id=<?=$item['id']?>">Update</a> | <a onclick="return confirm('Are you sure');" href="?option=deleteproducttype&id=<?=$item['id']?>">Delete</a></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>