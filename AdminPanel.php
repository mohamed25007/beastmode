<?php ob_start();
		session_start();
		require "dialogDraws.php";
		
		if (!isset($_SESSION['user'])) {
		header("Location: Admin.php");
		die();
		
		} else if ($_SESSION['user'] == 'Admin') {
				require "DatabasePosts.php"; 
				} else die();
		
		
		?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<title>Admin Control Panel</title>
	<!-- IMPORT JQUERY UI -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/be7019ee387/integration/jqueryui/dataTables.jqueryui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="css/dataTablesCustomers.css">
    <link rel="stylesheet" href="css/dataTablesOrders.css">

  <!-- IMPORT OF JQUERY FUNCTIONS -->
  <script type="text/javascript" src="JQueryFunctions.js"></script>

 <link rel="stylesheet" type="text/css" href="AdminCP.css">

  
  
</head>
<body >

		
    <div id="logo">
	 <a href="">
 	 <img src="images/logo.png" alt="" border="0"  />  </a></div>
	 
<div id="tabs" >
  <ul>
    <li><a href="#tabs-Products">Products</a></li>
    <li><a href="#tabs-Customer">Customer</a></li>
    <li><a href="#tabs-Order">Orders</a></li>
  </ul>
  <div id="tabs-Products">
  <!-------------------------------------- PRODUCT TAB CONTENT------------------------------------------------------------------>
  <table id="DBTable" class="display" style="table-layout: fixed; width: 90%">
		<thead>
		<tr class="ui-widget-header ">
			<th width="10px">ID</th>
			<th>Product Id</th>
			<th>Name</th>
			<th width="120px">Manufacturer</th>
			<th>Description</th>
			<th width="150px">Category</th>
			<th width="75px">Price</th>
			<th>Specification</th>
			<th width="80px">Delivery</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody>
			<?php
			
			$sql = "SELECT * FROM products";
			$STH = $GLOBALS["db"]->prepare($sql);			
			$STH->execute();
			
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$product_id=$row['product_id'];
			$name = $row ['name'];
			$manufacturer = $row['manufactureId'];
			$description = $row['description'];
			$categoryID = $row['categoryID'];
			
			$sqlCat = "SELECT * FROM categories WHERE CatID = :categoryID;";
			$STHCat = $GLOBALS["db"]->prepare($sqlCat);
			$STHCat->bindParam(":categoryID", $categoryID);
			$STHCat->execute();
			
		   $resCat = $STHCat->fetch(PDO::FETCH_ASSOC);
		   $categoryName = $resCat['CatName']; 


		   
		   // Displaying Manufacture Name 
		   $sqlManu = "SELECT * FROM manufactures WHERE ManufactureID = :manfacturerID;";
			$STHManu = $GLOBALS["db"]->prepare($sqlManu);
			$STHManu->bindParam(":manfacturerID", $manufacturer);
			$STHManu->execute();			
			
		   $getManufacture = $STHManu->fetch(PDO::FETCH_ASSOC);
		   $ManuName = $getManufacture['ManufactureName']; 
			
			$delivery_charges = $row['delivery_charges']; 
			
			$price = $row['price'];
			$specification = $row['specification'];

			
			echo "<tr > <td> $id </td>  <td> $product_id </td>
			<td> $name </td> <td>$ManuName</td> <td> $description  </td> <td> $categoryName </td> <td> £$price </td> <td> $specification</td> <td> £$delivery_charges </td> </tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 
 <p> SELECTED PRODUCT: </p>
 <table style="table-layout: fixed; width: 100%" class="selected">
 		<tr >
			<th width="50px">ID</th>
			<th>product id</th>
			<th>Name</th>
			<th width="150px"> Manufacturer </th>
			<th>Description</th>
			<th width="150px">Category</th>
			<th width="75px">Price</th>
			<th>Specification</th>
			<th width="80px">Delivery</th>
		</tr>
 <tr id="selectedResult"> </tr>
 
 </table>
 
  <br/>
 
 <!-- PRODUCT BUTTON FUNCTIONS -->
<a href="javascript:void(null);" onclick="showDialog();"> <button id="new-product">Add New Product</button> </a>
 <a href="javascript:void(null);" onclick="showConfirmationDialog();">  <button id="delete-product">Delete Product</button> </a>
   <a href="javascript:void(null);" onclick="showEditDialog();">  <button id="edit-product">Edit Product</button>  </a>
     <a href="javascript:void(null);" onclick="showImageDialog();">  <button id="edit-product">Add Images</button>  </a>

<!--  Mo Code START Category and manufacture -->
<a href="javascript:void(null);" onclick="showDialogCat();"> <button id="new-product">Categories</button> </a>
<a href="javascript:void(null);" onclick="showDialogMaunfacture();"> <button id="new-product">Manufacturers</button> </a>


   
<?php dailogAddManufacture(); // manufacture  ?>   
   
<?php dailogAddCat(); // Category ?>
 
<!--  Mo Code END - Category and manufacture --> 
   
   <!-- DELETE PRODUCT DIALOG ------------------------------------------------------------------------------>
  <?php dialogDeleteProduct(); ?>
  <!-- END DIALOG BOX -->
     
   
   <!-- CREATE NEW PRODUCT DIALOG -------------------------------------------------------------------------->
<?php dialogAddNewProduct(); ?>
 <!-- END DIALOG BOX -->
 
   <!-- EDIT PRODUCT DIALOG -------------------------------------------------------------------------->
<?php dialogEditProduct(); ?>
 <!-- END DIALOG BOX -->
 
 <?php dialogAddImages(); ?>
 
 
 
 
 
  </div>
 <!----------PRODUCT TAB END--------------->
  <div id="tabs-Customer">
    <!--------------------------------------------- CUSTOMER TAB CONTENT----------------------------------------------------->
	
	<table id="DBTableCustomer" class="display" style="table-layout: fixed; width: 90%;">
		<thead>
		<tr class="ui-widget-header ">
			<th width="30px">ID</th>
			<th width="60px">Title</th>
			<th width="120px">First Name</th>
			<th width="120px">Last Name</th>
			<th width="210px">Email</th>
			<th width="150px">Phone No'</th>
			<th width="300px">Address..</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody >
			<?php
			
			$sql = "SELECT * FROM customers";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$title = $row ['title'];
			$FName = $row['firstName'];
			$LName = $row['lastName'];
			$Email = $row['email'];
			$Phone = $row['phoneNumber'];
			$Address = $row['addressLine1']."|".$row['addressLine2']."|".$row['addressCity']."|".$row['addressPostal'];
			
			
			echo "<tr > <td> $id </td> 
<td> $title </td> <td> $FName </td> <td> $LName  </td> <td> $Email </td>
 <td> $Phone </td> <td> $Address</td> </tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 <p> SELECTED CUSTOMER: </p>
 <table style="table-layout: fixed; width: 100%" class="selectedCustomer">
		<tr >
			<th width="30px">ID</th>
			<th width="60px">Title</th>
			<th width="120px">First Name</th>
			<th width="120px">Last Name</th>
			<th width="200px">Email</th>
			<th width="150px">Phone No'</th>
			<th>Address..</th>
			</tr>
 <tr id="selectedResultCustomer"> </tr>
 
 </table>
 
  <br/>
 
 <!-- Customer BUTTON FUNCTIONS -->
 <a href="javascript:void(null);" onclick="showConfirmationDialogCustomer();">  <button id="delete-customer">Delete Customer</button> </a>
   <a href="javascript:void(null);" onclick="showEditDialogCustomer();">  <button id="edit-customer">Edit Customer</button>  </a>
      <a href="javascript:void(null);" onclick="showEmailDialog();">  <button id="email-customer">Email Customer</button>  </a>

   
   <!-- DELETE Customer DIALOG -------->
  <?php dialogDeleteCustomer(); ?>
  <!-- END DIALOG BOX -->
     
   <!-- EDIT Customer DIALOG --------->
<?php dialogEditCustomer(); ?>
 <!-- END DIALOG BOX -->
 
    <!-- EMAIL Customer DIALOG --------->
<?php dialogEmailCustomer(); ?>
 <!-- EMAIL DIALOG BOX -->
 
 
  </div>
	
 <!----------CUSTOMER TAB END--------------->
  <div id="tabs-Order">
      <!--------------------------------------------- ORDERS TAB CONTENT----------------------------------------------------->
	  
	<table id="DBTableOrders" class="display" style="table-layout: fixed; width: 90%;">
		<thead>
		<tr class="ui-widget-header ">
			<th width="30px">ID</th>
			<!--<th width="60px">Products (IDs)</th>-->
			<th width="260px">Product Details</th>
			<th width="70px">Customer ID</th>
			<th width="80px">Date</th>
			<th width="80px">Time</th>
			<!--<th width="100px">Auth String</th>-->
			<th width="80px">Total Payment</th>
			<th width="100px">Status(ID)</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody >
			<?php
		//	$xml = simplexml_load_file('resources.xml');
			
			$sql = "SELECT * FROM productorders where statusID!=0";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			//$productID = $row ['productIDArray']; //Needs to be split
			$productQuantity = $row['productQuantityArray']; //Needs to be split
			$CustomerID = $row['customerID'];
			$Date = $row['date'];
			$Time = $row['time'];
			//$AuthString = $row['authorisationString'];
			$Payment = $row['totalPrice'];
			if($row['statusID']==1){$Status = 'Processing';}elseif($row['statusID']==2){$Status = 'Shipped';}elseif($row['statusID']==3){$Status = 'Cancelled';}elseif($row['statusID']==4){$Status = 'Refunded';}else{$Status = 'Payment Pending';}
		
  // $StatusID = $row['statusID']; // 1 is Processing, 2 is Shipped, 3 is Cancelled, 4 is Refunded.
  // $Status = 'status'.$StatusID;
			//$Status = $xml->status->$Status; 
			
			
		/*	echo "<tr > <td> $id </td> 
<td> $productID </td> <td> $productQuantity </td> <td> $CustomerID  </td> <td> $Date </td>
 <td> $Time </td> <td> $AuthString</td>  <td> £$Payment</td>  <td> $Status ($StatusID)</td></tr>";
		*/
		$product=explode(',',$productQuantity);
		$productQuantity='';
		foreach($product as $prod){
		$productQuantity.=$prod.'</br>';
		}
			echo "<tr > <td> $id </td> <td> $productQuantity </td> <td> $CustomerID  </td> <td> $Date </td>
 <td> $Time </td> <td> £$Payment</td>  <td> $Status</td></tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 <p> SELECTED ORDER: </p>
 <table style="table-layout: fixed; width: 100%" class="selectedOrders">
		<tr >
				<th width="30px">ID</th>
			<!--<th width="60px">Products (IDs)</th>-->
			<th width="260px">Product Details</th>
			<th width="70px">Customer ID</th>
			<th width="80px">Date</th>
			<th width="80px">Time</th>
			<!--<th width="100px">Auth String</th>-->
			<th width="80px">Total Payment</th>
			<th width="100px">Status(ID)</th>
			</tr>
 <tr id="selectedResultOrders"> </tr>
 
 </table>
  <!-- Hidden Tables -->
  <table style="display:none;" >
		<tr >
			<th width="30px">ID</th>
			<th width="60px">Title</th>
			<th width="120px">First Name</th>
			<th width="120px">Last Name</th>
			<th width="210px">Email</th>
			<th width="150px">Phone No'</th>
			<th width="300px">Address..</th>
			</tr>
 
 <?php 
 			$sql = "SELECT * FROM customers";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$title = $row ['title'];
			$FName = $row['firstName'];
			$LName = $row['lastName'];
			$Email = $row['email'];
			$Phone = $row['phoneNumber'];
			$Address = $row['addressLine1']."|".$row['addressLine2']."|".$row['addressCity']."|".$row['addressPostal'];
			
			
			echo "<tr > <td class='customerRow$id'> $id </td> 
<td class='customerRow$id'> $title </td class='customerRow$id'> <td class='customerRow$id'> $FName </td> <td class='customerRow$id'> $LName  </td> <td class='customerRow$id'> $Email </td>
 <td class='customerRow$id'> $Phone </td> <td class='customerRow$id'> $Address</td> </tr>";
			
			}
 
 ?>
 </table>
   <table style="display:none;" >
 <?php 
 			$sql = "SELECT * FROM products";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$name = $row ['name'];
			$price = $row['price'];			
			
			echo "<tr > <td class='productRow$id'> $id </td> 
<td class='productRow$id'> $name </td> <td class='productRow$id'> $price </td>  </tr>";
			
			}
 
 ?>
 </table>
 
  <br/>
 
 <!-- Customer BUTTON FUNCTIONS -->
 <a href="javascript:void(null);" onclick="showViewOrderDialog();">  <button id="view-order">View Order</button> </a>
   <a href="javascript:void(null);" onclick="showEditStatusDialog();">  <button id="edit-status">Change Status</button>  </a>
      <a href="javascript:void(null);" onclick="showViewCustomerDialog();">  <button id="view-customer">View/Contact Customer</button>  </a>

   
   <!-- VIEW ORDERS DIALOG -------->
  <?php dialogOrdersView(); ?>
  <!-- END DIALOG BOX -->
     
   <!-- CHANGE STATUS DIALOG --------->
<?php dialogOrderStatus(); ?>
 <!-- END DIALOG BOX -->
 
    <!-- CONTACT CUSTOMER DIALOG --------->
<?php dialogCustomerView(); ?>
 <!-- EMAIL DIALOG BOX -->
 
  </div>
<!----------ORDERS TAB END--------------->
</div> <!-- TABS END -->


</body>
</html>


