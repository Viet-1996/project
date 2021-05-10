<section>
	<?php
		$query="select*from pricerange";
		$result=$connect->query($query);
		foreach ($result as $item):
	?>
	<section>
		<a href="?option=search&start=<?=$item['start']?>&end=<?=$item['end']?>"><?=$item['end']=0?number_format($item['start'],0,',','.')." trở lên":number_format($item['start'],0,',','.').' - '.number_format($item['end'],0,',','.')?></a>
	</section>
	<?php endforeach; ?>
</section>