<section>
	<?php foreach($result as $item):?>
		<section class="product">
			<section><a href="?option=productdetail&id=<?=$item['id']?>"><img src="img/<?=$item['image']?>"></a></section>
			<section><a href="?option=productdetail&id=<?=$item['id']?>"><?=$item['name']?></a></section>
			<section><?=number_format($item['price'],0,',','.')?> vnđ</section>
			<section><input type="button" value="Đặt mua"></section>
		</section>
	<?php endforeach; ?>
</section>