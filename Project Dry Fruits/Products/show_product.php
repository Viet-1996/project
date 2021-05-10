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