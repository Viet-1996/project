<?php
	$id=$_GET['id'];
	$query="select*from product where id=".$_GET['id'];
	$result=$connect->query($query);
	$result=mysqli_fetch_array($result);
?>
<?php if(isset($alert)):?>
	<script>alert('Bình luận của bạn đã được gửi. Chúng tôi sẽ xem xét để hiển thị!')</script>
<?php endif;?>
<h1>Chi tiết sản phẩm</h1>
<section>
	<section><img class="img-fluid" src="img/<?=$result['image']?>"></section>
	<section><?=$result['description']?></section>
 	<h2 style="float: left;">Bình luận cho sản phẩm</h2><br><br>
	<?php if(mysqli_num_rows($comments)==0):?>
		<section style="float: left;">Không có bình luận nào!</section>
	<?php else:?>
	<?php foreach($comments as $item):?>	
		<h3 style="float: left;text-indent: 10px;text-transform: capitalize;"><?=$item['fullname']?></h3><br><br>
		<section style="float: left;text-transform: capitalize;"><?=$item['content']?></section><br>
		<section style="float: left;"><i class="far fa-clock"></i> <?=$item['date']?></section>
	<?php endforeach;?>
	<?php endif;?> 
	<?php if(isset($_SESSION['customer'])):?>
		<hr>
		<h2>Viết bình luận:</h2>
		<section>
			<form method="post">
				<section><textarea name="content" rows="3" cols="100" required></textarea></section>
				<section><input type="submit" value="Gửi"></section>
			</form>
		</section>
	<?php else:?>
		<section>Bạn hãy <a href=?option=signin>đăng nhập</a> để bình luận</section>
	<?php endif;?>
</section>

