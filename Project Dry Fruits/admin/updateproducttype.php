<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from producttype where name='$name' and id!=".$_GET['id'];
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên loại sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			$status=$_POST['status'];
			$query="update producttype set name='$name', status='$status' where id=".$_GET['id'];
			$connect->query($query);
			header("location: ?option=producttype");
		}
	}
?>
<?php
	$query="select*from producttype where id=".$_GET['id'];
	$result=$connect->query($query);
	$result=mysqli_fetch_array($result);
?>
<h1 style="text-align: center;">Sửa loại sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST">
		<table>
			<tr>
				<td><label>Tên: </label></td>
				<td><input type="text" name="name" value="<?=$result['name']?>"></td>
			</tr>
			<tr>
				<td><label>Trạng thái:</label></td>
				<td><input type="radio" name="status" value="1" <?=$result['status']==1?'checked':''?>>Active <input type="radio" name="status" value="0" <?=$result['status']==0?'checked':''?>> InActive</td>
			</tr>
			<tr>
				<td><input type="submit" value="update"></td>
			</tr>
		</table>
	</form>
</section>