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
  
  <link rel="stylesheet" href="css/forms.css" />
	
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
		<a href="shoppingcart.php">Shopping Cart</a>
			</li>
			
	<li> <a href="contact.php" class="current_page">Contact Us </a></li>
			
				</li> <!-- End of Club Nights Drop Down -->
				
				</ul>
			</nav>	
    </div>

    <!-- end of menu tab -->


	 
	 


<!-- middle section (PAGE CONTENT)-->



<div class="center_content" style="width:700px; margin-left:200px; padding-top:30px; padding-bottom:50px;">

<form id="contact-form" action="DatabasePosts.php" method="post">
			<h3>Contact Us</h3>
			<h4>Fill in the form below, and we'll get back to you as soon as possible.</h4>
			<div>
				<label>
					<span>Name: (required)</span>
					<input placeholder="Please enter your name" type="text" name="name" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Email: (required)</span>
					<input placeholder="Please enter your email address" type="email" name="email" required>
				</label>
			</div>
			<div>
				<label>
					<span>Telephone: (required)</span>
					<input placeholder="Please enter your number" type="tel" name="telephone" required>
				</label>
			</div>
			<div>
				<label>
					<span>Message: (required)</span>
					<textarea placeholder="Include all the details you can" name="messege" required> </textarea>
				</label>
			</div>
			<div>
				<button name="submit" type="submit">Send Email</button>
			</div>
			<input type="hidden" name="function" value="emailWebMaster" />
		</form>

</div>
<!-- end of page content (MIDDLE CONTENT)-->


    <!-- end of right content -->





<!-- end of page content (MIDDLE CONTENT)-->



  </div>
  <!-- end of main content -->


<!-- START OF FOOTER-->
  <div class="footer">
    <div class="left_footer"> <img src="images/logo.png" alt="" width="150" /> </div>
      <div class="center_footer"> <font size="1" >A.P. TOOLS. Trading as A.P. Imaging. </font> <br />
      </div>
    <div class="right_footer"> <a href="index.php">Home</a> <a href="contact.php">Contact Us</a> <a href="info.php">Terms & Conditions</a> </div>
  <div class="right_footer"> <a href="">home</a> <a href="">contact us</a> </div>
  </div>
<!-- end of footer-->
</div>
<!-- end of main_container -->
</body>
</html>
