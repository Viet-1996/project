<section>
	<?php foreach($result as $item):?>
		<section class="product">
			<section class="img"><a href="?option=productdetail&id=<?=$item['id']?>"><img src="img/<?=$item['image']?>"></a></section>
			<section class="name"><a href="?option=productdetail&id=<?=$item['id']?>"><?=$item['name']?></a></section>
			<section class="price"><?=number_format($item['price'],0,',','.')?> vnđ</section>
			<section class="order"><input type="button" value="Đặt mua"></section>
		</section>
	<?php endforeach; ?>
</section>

<?php
	function getCommentByProductId($productId){
		global $connect;
		$query="select*from customer a join comments b on a.id=b.customerId where productId=$productId and b.status";
		$result=$connect->query($query);
		return $result;
	}
?>