<?php ob_start(); session_start();
require_once('DatabasePosts.php');
/*
if(  (@$_REQUEST['del']) and   (@$_REQUEST['del'] !="") ) {

$del = $_REQUEST['del'];
$carts = $_SESSION['cart_products'];

$delID = array_key_exists($del,$carts);
if(isset($delID)){
//unset($cart[]);
//echo $cart['next_id'];
//die;
unset($_SESSION['cart_products'][$delID]);
$cart = array_values($_SESSION['cart_products']);
$cart['next_id']=$carts['next_id'];
$_SESSION['cart_products']= $cart;
//print "<pre>"; print_r($_SESSION['cart_products']);die;
}
$refer = $_SERVER['HTTP_REFERER'];
header("Location: " .$refer);

}else*/{
if(isset($_SESSION['cart_products'])){
$session=$_SESSION['cart_products'];
$next_id=$session['next_id'];
}else{$session=array();
$next_id=0;}
$updated=1;$j=0;
	
for($i=0;$i<=$next_id-1;$i++){

	if($session[$i]['product_id']==$_GET['id']){
		
		$session[$i]['qty']=$session[$i]['qty']+1;
		$_SESSION['cart_products']=$session;
		$updated=0;
	}
	if(isset($_REQUEST['del']) && $_REQUEST['del'] ==$session[$i]['product_id']) {
	$updated=0;
	}else{
	$cart[$j]=$session[$i];
	$j=$j+1;
	$cart['next_id']=$j;
}

}
	

if($updated){
$product=getproductdetails($_GET['id']);
$cart[$next_id]['product_id']=$product['id'];
$cart[$next_id]['name']=$product['name'];
$cart[$next_id]['qty']=1;
$cart[$next_id]['price']=$product['price']+$product['delivery_charges'];
$cart['next_id']=$next_id+1;
}
unset($_SESSION['cart_products']);
$_SESSION['cart_products']=$cart;
}
//session_destroy();
$refer = $_SERVER['HTTP_REFERER'];
header("Location: " .$refer);

?>