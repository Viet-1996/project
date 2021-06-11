<?php
	if(empty($_SESSION['cart'])){
		$_SESSION['cart']=array();
	}
	if(isset($_GET['action'])){
		$id=isset($_GET['id'])?$_GET['id']:'';
		switch($_GET['action']){
			case'add':
				if(array_key_exists($id, array_keys($_SESSION['cart']))){
					$_SESSION['cart'][$id]++;
				} else{
					$_SESSION['cart'][$id]=1;
				}
				header("location: ?option=cart");
				break;
			case'delete':
				unset($_SESSION['cart'][$id]);
				break;
			case 'deleteall':
				unset($_SESSION['cart']);
				break;
			case'update':
				if(($_GET['type'])=='asc'){
					$_SESSION['cart'][$id]++;
				}
				else
					if($_SESSION['cart'][$id]>1){
						$_SESSION['cart'][$id]--;
					}
				header("location: ?option=cart");
				break;
			case 'order':
				if(isset($_SESSION['customer'])){
					header("location: ?option=order");
				} else{
					header("location: ?option=signin&order=1");
				}
				break;
		}
	}
?>

<section>
	<?php
		if(!empty($_SESSION['cart'])):
		$ids = implode(',', array_keys($_SESSION['cart']));
		$query="select*from product where id in($ids)";
		$result=$connect->query($query);
	?>
	<table class="table table-bordered">
		<tr>
			<td>Image</td>
			<td>Name</td>
			<td>Price (vnđ)</td>
			<td>Number</td>
			<td>subTotal</td>
		</tr>
		<?php
			$total=0;
			foreach($result as $item):
		?>
		<tr>
			<td width="20%"><img width="100%" src="img/<?=$item['image']?>"></td>
			<td><?=$item['name']?><br><input type="button" class="btn btn-danger" value="Xóa" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';"></td>
			<td><?=number_format($item['price'],0,',','.')?></td>
			<td><?=$_SESSION['cart'][$item['id']]?> <input type="button" class="btn btn-outline-success" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';"> <input type="button" class="btn btn-outline-danger" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';"></td>
			<td><?=number_format($subTotal=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
			<?php $total+=$subTotal;?>
		</tr>
	<?php endforeach;?>
		<tr>
			<td colspan="5">
				<section>Tổng tiền (vnđ): <?=number_format($total,0,',','.')?></section>
				<section><input type="button" class="btn btn-outline-danger" value="Xóa giỏ hàng" onclick="if(confirm('Bạn có muốn xóa giỏ hàng không?')) location='?option=cart&action=deleteall';"> <input type="button" class="btn btn-outline-success" value="Đặt hàng" onclick="location='?option=cart&action=order';"></section>
				<section><a href="?option=home" class="btn btn-outline-warning">Quay lại</a></section>
			</td>
		</tr>
	</table>
	<?php else: ?>
		<section style="text-align: center;color: orange; font-weight: bold; font-size: 25px; margin-top: 30px;">Giỏ hàng trống!</section>
	<?php endif; ?>
</section>