<?php session_start();require_once('DatabasePosts.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> TOOLS FAM, TOOLS</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="contentslider.css" />
<link rel="stylesheet" href="css/MainCSS.css" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic" rel="stylesheet" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->

<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="contentslider.js"></script>

<style type="text/css">

#slider4{
border-color: darkred;
margin-left: 15px;
height: 280px
}

#paginate-slider4{
background-color: darkred;
border-color: darkred;
/*margin-left: 15px;*/
}

#paginate-slider4 a img{
width: 80px;
height: 60px;
border: 2px solid gray;
margin-top: 5px;
}

#paginate-slider4 a img:hover, #paginate-slider4 a.selected img{
border: 2px solid red;
}

</style>

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
				<a href="products.php" class="current_page"> Products </a>
						</li>													
					<li>
		<a href="Login.php"  >My Account</a>
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


	<!-- SIDE LINKS (CATEGORIES )-->
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
	  
<!-- Mo Code - START displaying categories     --->	  
<?php 
	$sql = "Select CatID, CatName from categories";
	$STH = $GLOBALS["db"]->query($sql);
	$xml = @simplexml_load_file("resources.xml");
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$CatID = $row['CatID'];
			$CatName = $row ['CatName'];
			echo '<li class="odd"><a href="index.php?Cat='.$CatID.'">'.$CatName.'</a></li>';

		}



?>
  
     </ul>

<!-- Mo Code - END displaying categories     --->	

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
    <div class="center_content_product">

<!-- Mo Code -  START OF CATEGORY PRODUCTS-->

<?php  if ( (@$_REQUEST['view']) and (@$_REQUEST['view'] !=""  )  ) {  // Display Category product

       $Pid = $_REQUEST['view'];
	   
	   $sql = "SELECT * from products WHERE id =".$Pid;
	   $execute =mysql_query($sql); 
	   $resultProduct = mysql_fetch_array($execute);
		$_SESSION['featured_category']=$resultProduct['categoryID'];
	   // Displaying Category Name 
	   $catname = getCatgoryName( $resultProduct['categoryID']);
	   $resCat = mysql_fetch_array($catname);
	   $category = $resCat['CatName']; 
	   
	   // Displaying Manufacture Name 
	   $ManufactureName = getManufactureName( $resultProduct['categoryID']);
	   $getManufacture = mysql_fetch_array($ManufactureName);
	   $Manufacture = $getManufacture['ManufactureName']; 
	   
	   
	   $sqlImages = "SELECT * FROM productimages WHERE 	ProdID = ".$Pid." ORDER BY PicID desc LIMIT 0 , 3" ;
	   $exeImg =mysql_query($sqlImages); 
	   
	  	   
	   
	   
?>		

<!-- product page layoput -->
<div class="prod_box_big_product">
	    
	<div id="slider4" class="sliderwrapper">
	<?php   
	    $directory = "ProductImages/";
		while($res= mysql_fetch_array($exeImg)) {
		?>
		<div class="contentdiv" style="background: url(<?php echo $directory.$res['imageName']?>) center left no-repeat"></div>
				
		<?php }
	
	 ?>
<!--	<div class="contentdiv" style="background: url(horses.jpg) center left no-repeat"></div>
		<div class="contentdiv" style="background: url(pine.jpg) center left no-repeat"></div>
		<div class="contentdiv" style="background: url(ocean.jpg) center left no-repeat"></div>
-->	
	</div>
	
	<div id="paginate-slider4" style="background:white; width:300px;">
	
	<?php   
	
	   $sqlthumbs = "SELECT * FROM productimages WHERE 	ProdID = ".$Pid." ORDER BY PicID desc LIMIT 0 , 3 " ;
	   $exethumbs =mysql_query($sqlthumbs); 

	    $directory = "ProductImages/";
		while($resThumbs= mysql_fetch_array($exethumbs)) {
		
		$thumbPic = $directory.$resThumbs['imageName'];
		
		 ?>
		
		<a href="#" class="toc someclass"><img src="<?php echo $thumbPic; ?>" /></a>
		
	<?php } ?>
	
	
	</div>

			
</div>       
<!--end product page layoput -->
	  
      <?php 
 } ?>

</div>
<!-- end of page content (MIDDLE CONTENT)-->



<!-- START OF right -->
    <div class="right_content" style="width:350px;">
	
	
          <div class="product_detail_title"><?php echo  ucwords(strtolower($resultProduct['name']));?></div>
         
          <div class="price" >Product Price: <span class="price_detail" style="padding-left:8px;">&#163;<?php echo  $resultProduct['price']?></span><br><br>Delivery Price:<span class="price_detail" style="padding-left:8px;">&#163;<?php echo  $resultProduct['delivery_charges']?></span></div>
		  <br />
		  <div class="price">Description: <?php echo  $resultProduct['description']?></div>
		  <br />
		  
		  		  <div class="price">Specification: <?php echo  $resultProduct['specification']?></div>
		  <br />
		  
		  
		  <div class="price">Category: <?php echo $category;?></div>
		  
		  <div class="price">Manufacturer: <?php echo $Manufacture;?> </div>

			<div class=" price prod_details_page_tab"  ><a href="addtocart.php?id=<?php echo $Pid;?>" class="prod_buy" style="width:200px;">Add To Cart</a> </div>  
	
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->


<!-- START OF FOOTER-->
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

</html>
<script type="text/javascript">

featuredcontentslider.init({
id: "slider4", //id of main slider DIV
contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
toc: "markup", //Valid values: "#increment", "markup", ["label1", "label2", etc]
nextprev: ["", "Next"], //labels for "prev" and "next" links. Set to "" to hide.
revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
enablefade: [true, 0.1], //[true/false, fadedegree]
autorotate: [false, 3000], //[true/false, pausetime]
onChange: function(previndex, curindex, contentdivs){ //event handler fired whenever script changes slide
//previndex holds index of last slide viewed b4 current (0=1st slide, 1=2nd etc)
//curindex holds index of currently shown slide (0=1st slide, 1=2nd etc)
}
})

</script>