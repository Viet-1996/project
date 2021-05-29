<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$producttypeid=$_POST['producttypeid'];
		$status=$_POST['status'];
		$fileName=$_FILES['image']['name'];
		$fileTemp=$_FILES['image']['tmp_name'];
		$folder="../img/";
		$imageName=time().'_'.$fileName;
		$ext=substr($imageName, strlen($imageName)-3,3);
		$ext1=substr($imageName, strlen($imageName)-4,4);
		$query="select*from product where name='$name'";
		$result=$connect->query($query);
		if(mysqli_num_rows($result)==1){
			$alert="Tên sản phẩm đã tồn tại. Đề nghị chọn tên khác.";
		} else{
			if($ext=='JPG'||$ext=='jpg'||$ext1=='JPEG'||$ext1=='jpeg'||$ext=='GIF'||$ext=='gif'||$ext=='BMP'||$ext=='bmp'||$ext=='PNG'||$ext=='png'){
				move_uploaded_file($fileTemp, $folder.$imageName);
				$status=$_POST['status'];
				$query="insert product (name,price,image,description,producttypeid,status) values('$name','$price','$imageName','$description','$producttypeid','$status')";
				$connect->query($query);
				header("location: ?option=product");
			} else {
				echo"Ảnh không đúng định dạng";
			}
		}
	}
?>
<h1 style="text-align: center;">Thêm sản phẩm</h1>
<section style="color: red"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST" enctype="multipart/form-data">
		<table class="table table-borderless">
			<tr>
				<td><label>Tên: </label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Giá cả: </label></td>
				<td><input type="number" name="price" min="0" step="1000"></td>
			</tr>
			<tr>
				<td><label>Ảnh: </label></td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td><label>Mô tả: </label></td>
				<td><textarea name="description" id="description"></textarea><script>CKEDITOR.replace("description");</script></td>
			</tr>
			<tr>
				<td><label>Loại sản phẩm</label></td>
				<td><select name="producttypeid">
					<option hidden>--Chọn loại sản phẩm--</option>
					<?php
						$query="select*from producttype";
						$result=$connect->query($query);
					?>
					<?php foreach($result as $item):?>
						<option value="<?=$item['id']?>"><?=$item['name']?></option>
					<?php endforeach;?>
				</select></td>
			</tr>
			<tr>
				<td><label>Trạng thái:</label></td>
				<td><input type="radio" name="status" value="1" checked>Active <input type="radio" name="status" value="0"> InActive</td>
			</tr>
		</table>
		<input type="submit" value="Thêm" class="btn btn-success">
	</form>
</section>