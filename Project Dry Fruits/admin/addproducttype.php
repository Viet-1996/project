<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from producttype where name='$name'";
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên loại sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			$status=$_POST['status'];
			$query="insert producttype (name,status) values('$name','$status')";
			$connect->query($query);
			header("location: ?option=producttype");
		}
	}
?>
<h1 style="text-align: center;">Thêm loại sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST">
		<table>
			<tr>
				<td><label>Tên: </label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Trạng thái:</label></td>
				<td><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="0"> InActive</td>
			</tr>
			<tr>
				<td><input type="submit" value="add"></td>
			</tr>
		</table>
	</form>
</section>