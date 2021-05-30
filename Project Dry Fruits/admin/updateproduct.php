<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from product where name='$name' and id!=".$_GET['id'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$producttypeid=$_POST['producttypeid'];
		$image=$result['image'];
		$status=$_POST['status'];
		$fileName=$_FILES['image']['name'];
		$fileTemp=$_FILES['image']['tmp_name'];
		$folder="../img/";
		$imageName=time().'_'.$fileName;
		$ext=substr($imageName, strlen($imageName)-3,3);
		$ext1=substr($imageName, strlen($imageName)-4,4);
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			if ($fileName==null) {
				$imageName=$image;
			} else{
				if($ext=='JPG'||$ext=='jpg'||$ext1=='JPEG'||$ext1=='jpeg'||$ext=='GIF'||$ext=='gif'||$ext=='BMP'||$ext=='bmp'||$ext=='PNG'||$ext=='png'){
					move_uploaded_file($fileTemp, $folder.$imageName);
					$status=$_POST['status'];
				} else {
					echo"Ảnh không đúng định dạng";
				}
			}
			$query="update product set name='$name', price='$price', image='$imagename', description='$description', producttypeid='$producttypeid', status='$status' where id=".$_GET['id'];
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
<h1 style="text-align: center;">Sửa sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Tên: </label></td>
				<td><input type="text" name="name" value="<?=$result['name']?>"></td>
			</tr>
			<tr>
				<td><label>Giá cả: </label></td>
				<td><input type="number" name="price" value="<?=$result['price']?>" step="1000"></td>
			</tr>
			<tr>
				<td><label>Ảnh: </label></td><td><img src="../img/<?=$result['image']?>"></td>
			</tr>
			<tr>
				<td><label>Chọn ảnh khác</label></td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td><label>Mô tả: </label></td>
				<td><textarea name="description" id="description"><?=$result['description']?></textarea><script>CKEDITOR.replace("description");</script></td>
			</tr>
			<tr>
				<td><label>Loại sản phẩm: </label></td>
				<td><select name="producttypeid">
					<option hidden>--Chọn loại sản phẩm--</option>
					<?php
						$query="select*from producttype";
						$producttype=$connect->query($query);
					?>
					<?php foreach($producttype as $item):?>
						<option value="<?=$item['id']?>"><?=$item['name']?></option>
					<?php endforeach;?></select>
				</td>
			</tr>
			<tr>
				<td><label>Trạng thái:</label></td>
				<td><input type="radio" name="status" value="1" <?=$result['status']==1?'checked':''?>>Active <input type="radio" name="status" value="0" <?=$result['status']==0?'checked':''?>> InActive</td>
			</tr>
		</table>
		<input type="submit" value="Chỉnh sửa" class="btn btn-primary">
	</form>
</section>