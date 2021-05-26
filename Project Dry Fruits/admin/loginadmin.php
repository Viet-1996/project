<?php
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "select*from admin where username='$username' and password='$password' ";
		$result = $connect->query($query);
		if (mysqli_num_rows($result)==0){
			$alert="Sai tên đăng nhập hoặc mật khẩu";
		} else{
			$result = mysqli_fetch_array($result);
			if ($result['status']==0){
				$alert="Tài khoản của bạn đang bị khóa";
			} else {
				$_SESSION['admin']=$username;
				header("location: .");
			}
		}
	}
?>
<h1>Đăng nhập tài khoản</h1>
<section><?=isset($alert)?$alert:""?></section>
<section>
	<form method="post">
		<section>
			<label>Tên tài khoản: </label> <input type="text" name="username" required>
		</section>
		<section>
			<label>Mật khẩu: </label><input type="password" name="password" required>
		</section>
		<section>
			<input type="submit" value="Đăng nhập">
		</section>
	</form>
</section>