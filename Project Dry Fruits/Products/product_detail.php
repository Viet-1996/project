<?php
	$query="select*from product where id=".$_GET['id'];
	$result=$connect->query($query);
	$result=mysqli_fetch_array($result);
?>
<h1>Chi tiết sản phẩm</h1>
<section>
	<section><img class="img-fluid" src="img/<?=$result['image']?>"></section>
	<section>...</section>
	<section><?=$result['description']?></section>
<!-- 	<h2>Bình luận cho sản phẩm</h2>
	<?php if(mysqli_num_rows($comments)==0):?>
		<section>Không có bình luận nào!</section>
	<?php else:?>
	<?php foreach($comments as $item):?>
		<h3><?=$item['name']?></h3>
		<section><?=$item['content']?></section>
	<?php endforeach;?>
	<?php endif;?> -->
</section>