<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from product where name='$name'";
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			$status=$_POST['status'];
			$query="insert product (name,price,image,description,producttypeid,status) values('$name','$price','$image','$description','$producttypeid','$status')";
			$connect->query($query);
			header("location: ?option=product");
		}
	}
?>
<h1>Thêm sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST">
		<table>
			<tr>
				<td><label>Name: </label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Price: </label></td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td><label>Image: </label></td>
				<td><input type="text" name="image"></td>
			</tr>
			<tr>
				<td><label>Description: </label></td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				<td><label>Product Type Id: </label></td>
				<td><input type="text" name="producttypeid"></td>
			</tr>
			<tr>
				<td><label>Status:</label></td>
				<td><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="0"> InActive</td>
			</tr>
			<tr>
				<td><input type="submit" value="add"></td>
			</tr>
		</table>
	</form>
</section>