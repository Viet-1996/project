<?php
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$query = "select * from customer where username='$username'";
		$result=$connect->query($query);
		if(mysqli_num_rows($result)!=0){
			$alert="Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác";
		} else{
			$password=md5($_POST['password']);
			$fullname=$_POST['fullname'];
			$phonenumber = $_POST['phonenumber'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$query="insert customer(username,password,fullname,phonenumber,email,address) values('$username','$password','$fullname','$phonenumber','$email','$address')";
			$connect->query($query);
			$alert="Bạn đã đăng kí thành công tài khoản, xin vui lòng chờ trong giây lát";
		}
	}
?>

<h1>Đăng ký tài khoản</h1>
<section style="color: red;font-weight: bold;font-size: 20px;text-align: center;"><?=isset($alert)?$alert:""?></section>
<section>
	<form method="post" onsubmit="if(repassword.value!=password.value){alert('Nhập lại mật khẩu không khớp'); repassword.select();return false;}">
		<table>
			<tr>
				<td><label>Tên đăng nhập</label></td>
				<td><input type="text" name="username" minlength="3" required></td>
			</tr>
			<tr>
				<td><label>Mật khẩu</label></td>
				<td><input type="password" name="password" required minlength="6" maxlength="20"></td>
			</tr>
			<tr>
				<td><label>Nhập lại mật khẩu</label></td>
				<td><input type="password" name="repassword" required></td>
			</tr>
			<tr>
				<td><label>Họ và tên</label></td>
				<td><input type="text" name="fullname" required></td>
			</tr>
			<tr>
				<td><label>Điện thoại</label></td>
				<td><input type="tel" name="phonenumber" required pattern="0\d{9}"></td>
			</tr>
			<tr>
				<td><label>Địa chỉ</label></td>
				<td><input type="text" name="address" required></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Đăng ký"></td>
			</tr>
		</table>
	</form>
</section>