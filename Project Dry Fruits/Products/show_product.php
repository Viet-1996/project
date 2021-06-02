<?php  
	$query="select*from product where status=1";
	$page=1;
	$option='';
	if(isset($_GET['keyword'])){
		$query.=" and name like '%".$_GET['keyword']."%'";
		$option='?option=search&keyword='.$_GET['keyword'];
	}elseif(isset($_GET['producttypeid'])){
		$query.=" and producttypeid=".$_GET['producttypeid'];
		$option='?option=search&producttypeid='.$_GET['producttypeid'];
	}
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	$productsperpage=4;
	$from=($page-1)*$productsperpage;
	$totalProducts=$connect->query($query);
	$totalPages=ceil(mysqli_num_rows($totalProducts)/$productsperpage);
	$query.=" limit $from,$productsperpage";
	
	$result=$connect->query($query);
	if(mysqli_num_rows($result)==0){
		echo"<br>";
		echo"Không có sản phẩm nào";
	}
?>

<section>
	<?php foreach($result as $item):?>
		<section class="product">
			<section><a href="?option=productdetail&id=<?=$item['id']?>"><img src="img/<?=$item['image']?>"></a></section>
			<section><a href="?option=productdetail&id=<?=$item['id']?>"><?=$item['name']?></a></section>
			<section><?=number_format($item['price'],0,',','.')?> vnđ</section>
			<section><input type="button" class="btn btn-outline-success" value="Đặt mua" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
		</section>
	<?php endforeach; ?>
</section>
<section class="pages">
	<?php for($i=1; $i<=$totalPages; $i++):?>
		<a class="highlight" href="<?=$option?>?page=<?=$i?>"><?=$i?></a>
	<?php endfor;?>
</section>