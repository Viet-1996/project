<?php
	$query="select*from brands where status = 1";
	$brands=$connect->query($query);
	foreach ($brands as $brand):
?>
<section class="brand">
	<a href="?option=search&brandid=<?=$brand['id']?>"><?=$brand['name']?></a>
</section>
<?php endforeach; ?>