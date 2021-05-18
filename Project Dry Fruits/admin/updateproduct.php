<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from product where name='$name' and id!=".$_GET['id'];
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			$status=$_POST['status'];
			$query="update product set name='$name', price='$price', image='$image', description='$description', producttypeid='$producttypeid', status='$status' where id=".$_GET['id'];
			$connect->query($query);
			header("location: ?option=product");
		}
	}
?>
<?php
	$query="select*from product where id=".$_GET['id'];
	$result=$connect->query($query);
	$result=mysqli_fetch_array($result);
?>
<h1>Sửa sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST">
		<table>
			<tr>
				<td><label>Name: </label></td>
				<td><input type="text" name="name" value="<?=$result['name']?>"></td>
			</tr>
			<tr>
				<td><label>Price: </label></td>
				<td><input type="text" name="price" value="<?=$result['price']?>"></td>
			</tr>
			<tr>
				<td><label>Image: </label></td>
				<td><input type="text" name="image" value="<?=$result['image']?>"></td>
			</tr>
			<tr>
				<td><label>Description: </label></td>
				<td><input type="text" name="description" value="<?=$result['description']?>"></td>
			</tr>
			<tr>
				<td><label>Product Type Id: </label></td>
				<td><input type="text" name="producttypeid" value="<?=$result['producttypeid']?>"></td>
			</tr>
			<tr>
				<td><label>Status:</label></td>
				<td><input type="radio" name="status" value="1" <?=$result['status']==1?'checked':''?>>Active <input type="radio" name="status" value="0" <?=$result['status']==0?'checked':''?>> InActive</td>
			</tr>
			<tr>
				<td><input type="submit" value="update"></td>
			</tr>
		</table>
	</form>
</section>