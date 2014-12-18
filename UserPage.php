<?php 

    require('common.php'); 
     
    if(empty($_SESSION['user'])) 
    { 

        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 
     

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
		<a href="Login.php" class="current_page" >My Account</a>
			</li>
			
			<li>
		<a href="shoppingcart.php">Shopping Cart</a>
			</li>
			
	<li> <a href="contact.php">Contact Us </a></li>
			
				</li> <!-- End of Club Nights Drop Down -->
				
				</ul>
			</nav>	
    </div>

    <!-- end of menu tab -->



 <div class="center_content" style="width:1000px; margin-left:30px; margin-bottom:50px;">
		
			
		<h1>YOUR ORDERS </h1>
		<table width='1000px' border='1' style='border-collapse:collapse;'  >
		<tr style = "background: linear-gradient(to bottom, #5b7899 0%,#2989d8 50%,#5293c9 51%,#7db9e8 100%);font-weight:bold; color:#fff;" > 
					<td width='70px'> Order ID </td>				
					<td width='500px'> Order/Products </td> 
					<td> Date  </td>
					<td> Time </td>
		 			<td> Total Price </td>  
					<td> Status </td>
					 
		</tr>
		<?php
		
		$sql = "SELECT * FROM productorders WHERE customerID=" . $_SESSION['userID'];
					$STH = $GLOBALS["db"]->query($sql);
						
					while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
					$id = $row['id'];
					$productID = $row ['productIDArray']; //Needs to be split
					$productQuantity = $row['productQuantityArray']; //Needs to be split
					$CustomerID = $row['customerID'];
					$Date = $row['date'];
					$Time = $row['time'];
					$AuthString = $row['authorisationString'];
					$Payment = $row['totalPrice'];
					$StatusID = $row['statusID']; // 1 is Processing, 2 is Shipped, 3 is Cancelled, 4 is Refunded.
					$StatusIDReal = "";
					if($StatusID == 1){
						$StatusIDReal = "Processing";
					}
					if($StatusID == 2){
						$StatusIDReal = "Shipped";
					}
					if($StatusID == 3){
						$StatusIDReal = "Cancelled";
					}
					if($StatusID == 4){
						$StatusIDReal = "Refunded";
					}
	
					$ProductIDSplited = explode("|", $productID);
					$ProductQuantitySplited = explode("|", $productQuantity);

					
					
					echo "	<tr style='background: linear-gradient(to bottom, #e1ffff 0%,#e1ffff 7%,#e1ffff 12%,#fdffff 12%,#e6f8fd 30%,#c8eefb 54%,#bee4f8 75%,#b1d8f5 100%);'> 
					<td> $id </td> <td> ";
					
					
			
			for ($i = 0; $i < sizeof($ProductIDSplited); $i++) {
			
 			$sqlProduct = "SELECT * FROM products WHERE id = ".$ProductIDSplited[$i];
			$STHProduct = $GLOBALS["db"]->query($sqlProduct);
								
			$row = $STHProduct->fetch(PDO::FETCH_ASSOC);
			
			$name = $row ['name'];
			$price = $row['price'];			
			
			echo "<p> <strong> Name: </strong>  $name  <strong>Price:</strong> £$price  <strong> Quantity: </strong>".$ProductQuantitySplited[$i];
			echo "</p>";																
					}
					 echo "</td>
					 <td>  $Date </td>
					 <td>  $Time </td>
					 <td>  £$Payment </td>
					 <td>  $StatusIDReal </td>
					
					</tr>
					";
			
					} // MAIN WHILE
			 
			echo "</table>";
 
 ?>
 </table>
 
 <h3> If you have any queries about an order please use the Contact Us Form or Call Us </h3>
		

	</div>

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
