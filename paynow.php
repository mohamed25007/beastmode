<?php session_start();

require_once('DatabasePosts.php');
 $order_id=addorder();

?>

<html>
<head><title>Processing Payment...</title></head>
<body onLoad="document.forms['paypal_form'].submit();">
<center><h2>Please wait, your order is being processed and you will be redirected to the paypal website.</h2></center>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Star OF PayPal -->

		<!-- <form method="post" name="paypal_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr">  // COMMENT THIS LINE -->
 <form method="post" name="paypal_form" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="upload" value="1"/>
<input type="hidden" name="cmd" value="_cart"/>
<input type="hidden" name="currency_code" value="GBP"/>
<input type="hidden" name="business" value="apimaging@hotmail.co.uk"/> 
<!-- <input type="hidden" name="business" value="mohamed100@hotmail.com"/> -->
<input type="hidden" name="return" value="http://www.ap-tools.co.uk/success.php?id=<?php echo $order_id?>"/>
<!--<input type="hidden" name="cpp_header_image" value="/logo.png">-->
<input type="hidden" name="cancel_return" value="http://www.ap-tools.co.uk/failure.php?id=<?php echo $order_id?>"/>
<input type="hidden" name="notify_url" value="http://www.ap-tools.co.uk/notify.php?id=<?php echo $order_id?>"/>
	<?php if(isset($_SESSION['cart_products'])){
				$session=$_SESSION['cart_products'];
				$next_id=$session['next_id'];
				}else{$session=array();
				$next_id=0;}
				for($i=0;$i<$next_id;$i++){
						$amount=$session[$i]['qty']*$session[$i]['price'];
			 ?>
		<tr>
<input type="hidden" name="item_name_<?php echo $i+1?>" value="<?php echo $session[$i]['name'];?>"/>
<input type="hidden" name="amount_<?php echo $i+1?>" value="<?php echo $amount;?>"/>
<input type="hidden" name="quantity_<?php echo $i+1?>" value="<?php echo $session[$i]['qty'];?>"/>
<?php }
unset($_SESSION['cart_products']); ?>
<center><br/><br/>If you are not automatically redirected to paypal within 5 seconds...<br/><br/>
<input type="submit" value="Click Here"></center>
</form>
</body></html>
