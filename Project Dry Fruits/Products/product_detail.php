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
	<table>
		<tr>
			<td style="width: 50%;"><section><img class="img-fluid" src="img/<?=$result['image']?>"></section></td>
			<td style="width: 50%;"><section><?=$result['description']?></section></td>
		</tr>
	</table>
	<table>
		<tr><td><h2 style="margin-top: 50px;">Bình luận cho sản phẩm</h2></td></tr>
		<?php if(mysqli_num_rows($comments)==0):?>
		<tr><td><section>Không có bình luận nào!</section></td></tr>
		<?php else:?>
		<?php foreach($comments as $item):?>
		<tr><td><h4 style="text-indent: 10px;text-transform: capitalize;float: left;"><?=$item['fullname']?></h4></td></tr>
		<tr><td><section style="float: left;text-transform: capitalize;"><?=$item['content']?></section></td></tr>
		<tr><td><section style="float: left;"><i class="far fa-clock"></i> <?=$item['date']?></section></td></tr>
		<?php endforeach;?>
		<?php endif;?> 
	<?php if(isset($_SESSION['customer'])):?>
		<hr>
		<tr><td><h2>Viết bình luận:</h2></td></tr>
		<section>
			<form method="post">
				<tr><td><textarea name="content" rows="3" cols="100" required></textarea></td></tr>
				<tr><td><input type="submit" value="Gửi"></td></tr>
			</form>
		</section>
	<?php else:?>
		<tr><td>Bạn hãy <a href=?option=signin>đăng nhập</a> để bình luận</td></tr>
	<?php endif;?>
</section>
	</table>
			
	

