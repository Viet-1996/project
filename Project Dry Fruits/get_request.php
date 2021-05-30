<?php
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case'policy':
				include'contact/policy.php';
				break;
			case'location':
				include'contact/location.php';
				break;
			case'introduce':
				include'introduce/introduce.php';
				break;
			case'home':
				include'home.php';
				break;
			case'cart':
				include 'cart.php';
				break;
			case'news':
				include 'news/tintuc.php';
				break;
			case'cart.php':
				include 'cart.php';
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
				include'products/show_product.php';
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