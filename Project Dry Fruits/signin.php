<?php
	global $connect;
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "select*from customer where username='$username' and password='$password' ";
		$result = $connect->query($query);
		if (mysqli_num_rows($result)==0){
			$alert="Sai tên đăng nhập hoặc mật khẩu";
		} else{
			$result = mysqli_fetch_array($result);
			if ($result['status']==0){
				$alert="Tài khoản chưa được kích hoạt , xin vui lòng chờ trong giây lát";
			} else {
				$_SESSION['customer']=$username;
				if(isset($_GET['order'])){
					header("location: ?option=order");
				} else{
					header("location: ?option=home");
				}
			}
		}
	}
?>
<h1>Đăng nhập tài khoản</h1>
<section><?=isset($alert)?$alert:""?></section>
<section>
	<form method="POST">
		<section>
			<label>Username: </label> <input type="text" name="username" required>
		</section>
		<section>
			<label>Password: </label><input type="password" name="password" required>
		</section>
		<section>
			<input type="submit" value="Đăng nhập">
		</section>
	</form>
</section>