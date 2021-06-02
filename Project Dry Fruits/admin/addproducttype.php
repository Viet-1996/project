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
		<table class="table table-borderless">
			<tr>
				<td><label>Tên: </label></td>
				<td><input type="text" name="name" style="width: 90%"></td>
			</tr>
			<tr>
				<td><label>Trạng thái:</label></td>
				<td><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="0"> InActive</td>
			</tr>
		</table>
		<input type="submit" value="Thêm" class="btn btn-success">
		<a href="?option=producttype" class="btn btn-danger">Quay lại</a>
	</form>
</section>