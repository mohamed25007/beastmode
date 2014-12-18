<?php session_start();
require_once('DatabasePosts.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> DILIPS TOOL SHOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="css/MainCSS.css" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic" rel="stylesheet" />
<script type="text/javascript" src="js/boxOver.js"></script>

	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->
  <script src="js/modernizr.js"></script>
	
</head>
</head>
<body>

<div id="main_container">
  <div id="header">

    
      
    <div class="big_banner"> 
	<a href="">
    </div>

    <div id="logo">
	 <a href="">
 	 <img src="images/logo.png" alt="" height="130px" border="0" /></a> </div>
    </div>

  <div id="main_content" ALIGN="CENTER">
   
    <div id="menu_tab" ALIGN="CENTER">
<nav id="nav" >
		<ul>
			<li ><a href="index.php"  >Home</a></li>
			<li> 
				<a href="products.php"> Products </a>
						</li>													
					<li>
		<a href="Login.php"  >My Account</a>
			</li>
			
			<li>
		<a href="shoppingcart.php" class="current_page" >Shopping Cart</a>
			</li>
			
	<li> <a href="contact.php">Contact Us </a></li>
			
				</li> <!-- End of Club Nights Drop Down -->
				
				</ul>
			</nav>	
    </div>

    <!-- end of menu tab -->


	 
	 


<!-- middle section (PAGE CONTENT)-->



		 <div class="center_content" style="width:1000px; margin-left:30px;">
<div class="shop-inner-cat">
 <div class="shop-inner-catleft"> </div>
 <div class="shop-inner-catmid">Shopping Cart</div>
 <div class="shop-inner-catright"> </div>
 <div class="shop-inner-catmid-area">
 	 <div class="form_con">
 <div class="basket_detail_con">
 <div class="basket_top">
  <table class="basket_header" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tbody><tr class="header">
      <th style="border-left:none;" height="31" width="229">Product</th>
      <th align="left" nowrap="nowrap" width="130">Quantity</th>
      <th align="left" width="135">Product Price</th>
     <!-- <th width="164" align="left">Lainnya			</th>-->
      <th align="left" width="141">Total</th>
	  <th align="left" width="141">Delete</th>
      </tr>
  </tbody></table>
 </div>

  <table class="basket_detail" cellpadding="10" cellspacing="0" border="0" width="100%">
        <tbody>
				<?php 
								
				if(isset($_SESSION['cart_products'])){
				$session=$_SESSION['cart_products'];
				$next_id=$session['next_id'];
				}else{$session=array();
				$next_id=0;}
				$total=0;
				for($i=0;$i<$next_id;$i++){
						$amount=$session[$i]['qty']*$session[$i]['price'];
						$total+=$amount;
			 ?>
		<tr>

      <td class="cell_des" align="center" width="229"><a style="color:#990000" href="#"><strong><?php echo $session[$i]['name'];?></strong></a></td>
      <td align="left" width="130"><?php echo $session[$i]['qty'];?></td>
      <td class="price1" align="left" width="135">
	  &#163;<?php echo $session[$i]['price'];?>      </td>
      <td class="price1" align="left" width="141">
      &#163;<?php echo $amount;?>      </td>
	  
	  <td class="price1" align="left" width="141"><a href="addtocart.php?del=<?php echo $session[$i]['product_id'];?>"><img src="images/button_delete_icon.png" /></a></td>
	  
    </tr><?php }?>
	</tbody></table>  
</div>
</div>
<div style="padding-top:12px; border-bottom:none;" class="basket_detail_con">
<div class="basket_top">
  </div>
  <table class="basket_detail" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tbody>
    <tr>
      <td align="right"><h4>Total ( <span>*Total Payable</span> )</h4></td>
      <td align="center"><strong>&#163;<?php echo $total?>       
        </strong></td>
    </tr>
    <tr style="border-bottom:none">
      <td style="border-bottom:none" colspan="2" align="right"></td>
    </tr>
  </tbody></table>
  

        

<!-- Star OF PayPal -->
<div class="basket_bottom">

  <table class="bottom" cellpadding="0" cellspacing="0" border="0" width="100%">
      <tbody><tr>
        <td align="center" height="41" width="31%"><a class="promotion_vouchers_a" href="index.php">Click Here To Continue Shopping</a></td>
        <td align="center" valign="middle" width="41%">&nbsp;</td>
        <td align="center" width="8%">&nbsp;</td>
        <td align="center" width="20%">
		
	
<a href="paynow.php" >Checkout</a></center>

							</td>
      </tr>
    </tbody></table>
</div>
<!-- end OF Palpal -->

</div>
<div class="clear"></div>
</div>
<div class="clearfloat"></div>
</div>    


  </div>
  <!-- end of main content -->


<!-- START OF FOOTER-->
  <div class="footer">
    <div class="left_footer"> <img src="images/logo.png" alt="" width="150" /> </div>
     <div class="center_footer"> <font size="1" >A.P. TOOLS. Trading as A.P. Imaging. </font> <br />
      </div>
    <div class="right_footer"> <a href="index.php">Home</a> <a href="contact.php">Contact Us</a> <a href="info.php">Terms & Conditions</a> </div>
   </div>
<!-- end of footer-->
</div>
<!-- end of main_container -->
</body>
</html>
