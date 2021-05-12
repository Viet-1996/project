<?php
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case'news':
				include 'news/tintuc.php';
				break;
			case'collection':
				include 'collection/bosuutap.php';
				break;
			case'contact':
				include 'contact/contact.php';
				break;
			case'signin':
				include'signin.php';
				break;
			case'register':
				include'register.php';
				break;
			case'productdetail':
				if(isset($_POST['content'])){
					addComment();
					$alert=1;
				}
				$product=getProductById();
				$comments=getCommentByProductId($product['id']);
				include'products/product_detail.php';
				break;
			case'search':
				include'search_product.php';
				break;
			case 'logout':
				unset($_SESSION['customer']);
				header("location: ?option=home");
				break;
		}
	} else{
		include 'home.php';
	}
?>