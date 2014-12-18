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
			<li ><a href="index.php" class="current_page" >Home</a></li>
			<li> 
				<a href="products.php"> Products </a>
						</li>													
					<li>
		<a href="Login.php">My Account</a>
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
	<div class="top_container" style="">
	<div class="oferta" style=" margin-left:140px;  " > 

	<div class="flexslider">
          <ul class="slides">
            <li>
  	    	    <img src="images/slide-00.png" />
  	    		</li>
  	    		<li>
  	    	    <img src="images/slide-01.png" />
  	    		</li>
  	    		<li>
  	    	    <img src="images/slide-02.png" />
  	    		</li>

          </ul>
        </div> 
     <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 <script src="js/libs/jquery-1.7.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
		controlNav: true,
      directionNav: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>
  
      </div>
	  </div>

	  

	  
	<!-- SIDE LINKS (CATEGORIES )-->

    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
	  
	  
	  
<!-- Mo Code - START displaying categories     --->	  
<?php 
	$sql = "Select CatID, CatName from categories";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$CatID = $row['CatID'];
			$CatName = $row ['CatName'];
			echo '<li class="odd"><a href="products.php?Cat='.$CatID.'">'.$CatName.'</a></li>';

		}



?>


<!-- Mo Code - END displaying categories     --->	
	  
<!--    <li class="odd"><a href="">Power Tools</a></li> <li class="even"><a href="">Air Tools</a></li>   
-->      </ul>
<!-- END OF CATEGORIES -->



	<!-- Special Products (BELOW CATEGORIES )-->
      <div class="title_box">Special Products</div>
      	           <?php
	  $result=getspecialproduct();
	  while ($row = mysql_fetch_array($result)) {?>
      <div class="border_box">
          <div class="product_title"><a href=""><?php echo $row['name'];?></a></div>
          <div class="product_img"><a href=""><img src="<?php echo "ProductImages/".getFirstProductImages($row['id']);?>" alt="" border="0" width="160px" height="84px" /></a></div>
          <div class="prod_price">Price<span class="price">&#163;<?php echo $row['price'];?></span></span>
		  </div>
      
      </div>
	      <?php }?><!-- Special Products (BELOW CATEGORIES )-->

	<!-- Special Products (BELOW CATEGORIES )-->
	</div>
   <!-- end of left content -->

<!-- middle section (PAGE CONTENT)-->
    <div class="center_content">

<!-- content main picture-->
<!--
  <div class="oferta"> <img src="images/p1.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">Other Special Offer or News Here</div>
          <div class="oferta_text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
          <a href="/" class="prod_buy">details</a> </div>
      </div>
    -->  
<!-- content main picture END-->


<!-- Mo Code -  START OF CATEGORY/MANUFATURER PRODUCTS-->

<?php  if (     ((@$_REQUEST['Cat']) and (@$_REQUEST['Cat'] !="")) ||  ((@$_REQUEST['manu']) and (@$_REQUEST['manu'] !=""))       ) {  

       if(@$_REQUEST['Cat']) { // Displaying Category Details
	   
	   $cat = $_REQUEST['Cat'];
	   
	   $catname = getCatgoryName($cat);
	   //$resCat = mysql_fetch_array($catname);
	   $category = $catname[0]['CatName'];

	   $CatProducts=getCatgoryProducts($cat);
	   $ProducQty = count($CatProducts); 

	   } else { // Displaying Manufacturer Details
	   
	   $cat = $_REQUEST['manu'];
	   $catname = getManufactureName($cat);
	   //$resCat = mysql_fetch_array($catname);
	   $category = $catname[0]['ManufactureName'];
	   
	   //print "<pre>"; print_r($category); die;

	   $CatProducts=getManufacturerProducts($cat);
	   $ProducQty =count($CatProducts); 
	   
	   }
	   
?>		
      <div class="center_title_bar"><?php echo ucwords(strtolower($category));?></div>
         <?php

	if($ProducQty > 0) {  // Display this section if prducts are in category

	   foreach ($CatProducts as $row ) {?>
	    <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="productview.php?view=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></div>
          
		 
		  <div class="product_img"><a href="productview.php?view=<?php echo $row['id'];?>"><img src="<?php echo "ProductImages/".getFirstProductImages($row['id']);?>" alt="" border="0" width="160px" height="84px" /></a></div>
		  
		  
		  
		  
          <div class="price">product price<span class="price">&#163;<?php echo $row['price'];?></span><br>delivery price:<span class="price">&#163;<?php echo $row['delivery_charges'];?></span>
		  </div>
        </div>
        <div class="prod_details_tab"> <a href="addtocart.php?id=<?php echo $row['id'];?>" class="prod_buy">Add to Cart</a> <a href="productview.php?view=<?php echo $row['id'];?>" class="prod_details">Details</a> </div>
      </div>
      <?php } // while
	
	} else { // Display this section if NO prducts are in category
	
	  echo '<div class="prod_details_tab">No Products available</div>';
	  
	  } // if($ProducQty > 0)
	
 } else { //  Display Home page products
	  ?>
<!-- Mo Code -  START OF CATEGORY PRODUCTS-->

<!-- START OF LATEST PRODUCTS-->
   <div class="center_title_bar">Latest Products</div>
      <?php
	  $result=getlatest();
	  
	  while ($row = mysql_fetch_array($result)) {
	
?>    <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="productview.php?view=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></div>
          <div class="product_img"><a href="productview.php?view=<?php echo $row['id'];?>"><img src="<?php echo "ProductImages/".getFirstProductImages($row['id']);?>" alt="" border="0" width="160px" height="84px" /></a></div>
          <div class="price">Price <span class="price">&#163;<?php echo $row['price'];?></span></span>
		  <div class="prod_details_tab"> <a href="addtocart.php?id=<?php echo $row['id'];?>" class="prod_buy">Add to Cart</a> <a href="productview.php?view=<?php echo $row['id'];?>" class="prod_details">Details</a> </div>
		  </div>
        </div>
        
      </div>
     
<?php }?>
<!-- end of latest products-->


<!-- START OF RECOMMENDED PRODUCTS-->
        <div class="center_title_bar">Recomended Products</div>
         <?php
	  $result=getfeaturesproduct();
	  while ($row = mysql_fetch_array($result)) {?>
	    <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="productview.php?view=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></div>
          <div class="product_img"><a href="productview.php?view=<?php echo $row['id'];?>"><img src="<?php echo "ProductImages/".getFirstProductImages($row['id']);?>" alt="" border="0" width="160px" height="84px" /></a></div>
          <div class="price">product price<span class="price">&#163;<?php echo $row['price'];?></span><br>delivery price:<span class="price">&#163;<?php echo $row['delivery_charges'];?></span>
		  </div>
        </div>
        <div class="prod_details_tab"> <a href="addtocart.php?id=<?php echo $row['id'];?>" class="prod_buy">Add to Cart</a> <a href="productview.php?view=<?php echo $row['id'];?>" class="prod_details">Details</a> </div>
      </div>
      <?php }?>
<!-- end of recommended products-->

<?php }  ?>



</div>
<!-- end of page content (MIDDLE CONTENT)-->



<!-- START OF right -->
    <div class="right_content">
      <div class="title_box">Search</div>

<!-- START OF SEARCH-->
      <div class="border_box">
	  <form action="products.php">
        <input type="text" name="query" class="newsletter_input" value="keyword"/>
        <button type="submit" href="" class="join">Search</button> 
		</form>
		</div>
<!-- end of search-->

 
<!-- START OF SHOPPING CART-->
	<div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
		<?php if(isset($_SESSION['cart_products'])){
				$session=$_SESSION['cart_products'];
				$next_id=$session['next_id'];
				}else{$session=array();
				$next_id=0;}
				$amount=0;
				$qty=0;
				for($i=0;$i<$next_id;$i++){
						
						$qty+=$session[$i]['qty'];
						$amount+=$session[$i]['qty']*$session[$i]['price'];
						
				} ?>
        <div class="cart_details"> <?php echo $qty?> items <br />
          <span class="border_cart"></span> Total: <span class="price">&#163;<?php echo $amount?></span> </div>
        <div class="cart_icon"><a href="shoppingcart.php"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
<!-- end of shopping cart-->

<!-- START OF WHATS NEW-->
      <div class="title_box">What's new</div>
               <?php
	  $result=getlatestproduct();
	  while ($row = mysql_fetch_array($result)) {?>
	 
	  
	  	  <div class="border_box" style="height:202px;">
        <div class="product_title"><a href="productview.php?view=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></div>
        <div class="product_img"><a href="productview.php?view=<?php echo $row['id'];?>"><img src="<?php echo "ProductImages/".getFirstProductImages($row['id']);?>" alt="" border="0" width="160px" height="84px" /></a></div>

        <div class="prod_price">product price<span class="price">&#163;<?php echo $row['price'];?></span><br>delivery price:<span class="price">&#163;<?php echo $row['delivery_charges'];?></div>
		<div class="prod_details_tab"> <a href="addtocart.php?id=<?php echo $row['id'];?>" class="prod_buy">Add to Cart</a> <a href="productview.php?view=<?php echo $row['id'];?>" class="prod_details">Details</a> </div>
		
      </div>
      <?php }?>
	  <br/>

<!-- end of whats new-->

<!-- Mo Code - START OF MANUFACTURERS-->
      <div class="title_box">Manufacturers</div>
      <ul class="left_menu">

<?php 
	$sql = "Select ManufactureID, ManufactureName from manufactures";
	$STH = $GLOBALS["db"]->query($sql);
	$xml = @simplexml_load_file("resources.xml");
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$ManufactureID = $row['ManufactureID'];
			$ManufactureName = $row ['ManufactureName'];
			echo '<li class="odd"><a href="products.php?manu='.$ManufactureID.'">'.ucwords(strtolower($ManufactureName)).'</a></li>';

		}
?>
      </ul>
<!-- Mo Code - START OF MANUFACTURERS-->      




    </div>
    <!-- end of right content -->
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
