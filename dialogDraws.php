<?php

function dailogAddManufacture() {
  echo '   <div id="dialog-modal-manu" title="Add Manufacturer" style="display: none;">
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
		<td> <label for="name"> Manufacturer Name: <label> </th>
		<td>
	    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
		</td>
	</tr>

   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="addNewManufacture">
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
  
 <div>
 
 
 <table  width="60%" align="center" style="border:1px solid black;" cellpadding=4>
 
 ' ;

	$sql = "Select ManufactureID, ManufactureName from manufactures";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$ManufactureID = $row['ManufactureID'];
			$ManufactureName = $row ['ManufactureName'];
			
			echo '<tr><td> '.$ManufactureName.'  </td>  '  ;
			echo '<td><a href="DatabasePosts.php?ManuView='.$ManufactureID.'">Delete</a></td>';
		}


 echo '
 
 </table>
 </div>
 
  
  
 
   </div> ';


}


function dailogAddCat() {
  echo '   <div id="dialog-modal-cat" title="Add Category" style="display: none;">
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
		<td> <label for="name"> Category Name: <label> </th>
		<td>
	    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
		</td>
	</tr>

   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="addNewCategory">
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
 
 
 <div>
 
 
 <table  width="60%" align="center" style="border:1px solid black;" cellpadding=4>
 
 ' ;
 


/*  Mo Code - START  Displaying Categories       */	

	$sql = "Select CatID, CatName from categories";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$CatID = $row['CatID'];
			$CatName = $row ['CatName'];

			echo '<tr><td> '.$CatName.'  </td>  '  ;
			echo '<td><a href="DatabasePosts.php?CatView='.$CatID.'">Delete</a></td>';
			 

		}

/*  Mo Code - END  Displaying Categories       */		




 echo '
 
 </table>
 </div>
 
 
 
   </div> ';


}



function dialogAddNewProduct() {
  echo '   <div id="dialog-modal" title="Add New Product" style="display: none;">
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" enctype="multipart/form-data" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
	<td> <label for="name"> Product Id: <label> </td>
    <td>
    <input type="text" name="product_id" id="product_id" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		
	<tr>
	<td> <label for="name"> Name: <label> </td>
    <td>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		
	<tr>
	<td>
	<label for="manufacturer">Manufacturer:</label>
	</td>
	<td>
    <select name="manufacturer">';
	
/*  Mo Code - START  Displaying Manufacture      */	

	$sql = "Select ManufactureID, ManufactureName from manufactures";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$ManufactureID = $row['ManufactureID'];
			$ManufactureName = $row ['ManufactureName'];
			echo '<option  value="'.$ManufactureID.'">'.$ManufactureName.'</option>';

		}

/*  Mo Code - START  Displaying Manufacture       */	
	
		
	echo '</select>
	</td>
	</tr>

	<tr>
	<td>
    <label for="description">Description:</label>
	</td>
	<td>
    <textarea rows="4" cols="50" name="description" id="description" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
	<tr>
	<td> <label for="name"> Special: <label> </th>
    <td>
	 <select name="special">
	 <option  value="0">No</option>
	 <option  value="1">Yes</option>
	 </select>
	</td>
	</tr>


	<tr>
	<td>
	<label for="category">Category:</label>
	</td>
	<td>
    <select name="category">';
	
/*  Mo Code - START  Displaying Categories       */	

	$sql = "Select CatID, CatName from categories";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$CatID = $row['CatID'];
			$CatName = $row ['CatName'];
			echo '<option  value="'.$CatID.'">'.$CatName.'</option>';

		}

/*  Mo Code - END  Displaying Categories       */		
	
		
	echo '</select>
	</td>
	</tr>
	
	<tr>
	<td>
	<label for="price">Price:</label>
	</td>
	<td>
    £<input type="text" name="price" id="price" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>


	<tr>
	<td>
	<label for="price">Delivery Charges:</label>
	</td>
	<td>
    £<input type="text" name="delivery" id="delivery" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>



	<tr>
	<td>
	<label for="specification">Specification:</label> 
	</td>
	<td>
	<textarea rows="4" cols="40" name="specification" id="specification" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
	<!--<tr>
	<td>
   <label for="pictures">Picture:</label> 
   </td>
   <td>
  <input type="file" name="file" id="file" > </td>
   </tr>-->
   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="addNewProduct">
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
 
   </div> ';

}

function dialogDeleteProduct(){

	echo ' <div id="dialog-modal-confirm" title="Delete Product Confirmation" style="display: none;">
   <h2> ARE YOU SURE YOU WANT TO DELETE THIS PRODUCT: </h2>
   <p id="deleteConfirmationP"> <p>
   
   <form method="post" action="DatabasePosts.php"> 
   
   <input  type="hidden" name="productID" id="productID" /> <!-- PRODUCT ID WILL BE FILLED BY JQUERY -->
   <input type="hidden" name="function" value="deleteProduct"/> 
   <button type="submit" > YES, I WANT TO DELETE THIS PRODUCT! </button>
   <button type="button" id="cancel"> NO, CANCEL! </button>
   
   </form>
   </div>';

}

function dialogEditProduct() {

echo '<div id="dialog-modal-edit" title="Edit Product" style="display: none;">
   <p class="validateTips">All form fields are required.</p>
   
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
  
  <fieldset>
	<table>
	<tr>
	<td> <label for="name"> Product Id: <label> </td>
    <td>
    <input type="text" name="product_id" id="product_id" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	
	<tr>
	<td> <label for="name"> Name: <label> </th>
    <td >
    <input type="text" name="name" id="edit-productName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="name"> Special: <label> </th>
    <td>
	 <select name="special" id="special_product">
	 <option  value="0">No</option>
	 <option  value="1">Yes</option>
	 </select>
	</td>
	</tr>
	<tr>
	<td>
	<label for="manufacturer">Manufacturer:</label>
	</td>
	<td>
    <select name="manufacturer">';
	
/*  Mo Code - START  Displaying Manufacture      */	

	$sql = "Select ManufactureID, ManufactureName from manufactures";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$ManufactureID = $row['ManufactureID'];
			$ManufactureName = $row ['ManufactureName'];
			echo '<option  value="'.$ManufactureID.'">'.$ManufactureName.'</option>';

		}

/*  Mo Code - START  Displaying Manufacture       */	
	
		
	echo '</select>
	</td>
	</tr>

	
	
	<tr>
	<td>
    <label for="description">Description:</label>
	</td>
	<td>
    <textarea rows="4" cols="50" name="description" id="edit-productDesc" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>


	<tr>
	<td>
	<label for="category">Category:</label>
	</td>
	<td>
    <select name="category">';
	
/*  Mo Code - START  Displaying Categories       */	

	$sql = "Select CatID, CatName from categories";
	$STH = $GLOBALS["db"]->query($sql);
		
		while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
		
			$CatID = $row['CatID'];
			$CatName = $row ['CatName'];
			echo '<option  value="'.$CatID.'">'.$CatName.'</option>';

		}

/*  Mo Code - END  Displaying Categories       */		
	
		
		
		
	echo '</select>
	</td>
	</tr>




	<tr>
	<td>
	<label for="price">Price:</label>
	</td>
	<td>
    £<input type="text" name="price" id="edit-productPrice" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	
	
	<tr>
	<td>
	<label for="price">Delivery Charges:</label>
	</td>
	<td>
    £<input type="text" name="delivery" id="edit-productDelivery" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>

	
	
	<tr>
	<td>
	<label for="specification">Specification:</label> 
	</td>
	<td>
	<textarea rows="4" cols="40" name="specification" id="edit-productSpec" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
	
   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="editProduct">
  
<input type="hidden" name="pid" id="edit-productID" >
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
 
   </div> ';


}

function dialogAddImages ()   {
echo '<div id="dialog-modal-image" title="Add Images" style="display: none;">
   <p class="validateTips"></p>
   
  <form method="post" action="DatabasePosts.php" enctype="multipart/form-data"  > <!-- MAIN FORM ----------------------------------->
  
  <fieldset>
	<table>
	<tr>
	<td> <label for="name"> Name: <label> </th>
    <td>
		   <p id="ProductName"><p>
	</td>
	</tr>
	
	
   <tr>
   <td>
   <label for="pictures">Images:</label> 
   </td>
   <td>
  <input type="file" name="files[]" multiple="multiple" accept="image/*"> </td>
   </tr>



	
   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="addProductImages">
  
<input type="hidden" name="pid" id="ProdID" >
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
 
   </div> ';


}


function dialogEditCustomer() {

echo '<div id="dialog-modal-edit-customer" title="Edit Customer" style="display: none;">
  <form method="post" action="DatabasePosts.php" > 
  <fieldset>
	<table>
	<tr>
	<td> <label for="title"> Title: <label> </th>
    <td >
    <input type="text" size="45" name="customerTitle" id="edit-customerTitle" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="FName"> First Name: <label> </th>
    <td >
    <input type="text" size="45" name="customerFName" id="edit-customerFName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	
		<tr>
	<td> <label for="LName"> Last Name: <label> </th>
    <td >
    <input type="text" size="45" name="customerLName" id="edit-customerLName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Email"> Email : <label> </th>
    <td >
    <input type="text" size="45" name="customerEmail" id="edit-customerEmail" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Number"> Phone Number: <label> </th>
    <td >
    <input type="text" size="45" name="customerNumber" id="edit-customerNumber" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="AddressL1"> Address Line 1: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressLine1" id="edit-customerAddressL1" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressL2"> Address Line 2: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressLine2" id="edit-customerAddressL2" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressCity"> Address City/Town: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressCity" id="edit-customerAddressCity" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressPostal"> Address Postal Code: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressPostal" id="edit-customerAddressPostal" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
   </table>
  </fieldset>
  
   <input  type="hidden" name="customerID" id="edit-customerID" /> 
  
  <input type="hidden" name="function" value="editCustomer">
  
  <div align="center">
  <button type="submit" value="Submit"> SUBMIT CHANGES! </button>
  </div>
  </form>
 
   </div> ';

}

function dialogDeleteCustomer(){

	echo ' <div id="dialog-modal-confirm-customer" title="Delete Customer Confirmation" style="display: none;">
   <h2> ARE YOU SURE YOU WANT TO DELETE THE CUSTOMER: </h2>
   <p id="deleteConfirmationCustomer" style="font-size:30px;"> <p>
   
   <form method="post" action="DatabasePosts.php"> 
   
   <input  type="hidden" name="customerID" id="customerID" /> 
   <input type="hidden" name="function" value="deleteCustomer"/> 
   <button type="submit" > YES, I WANT TO DELETE THIS CUSTOMER! </button>
   <button type="button" id="cancel"> NO, CANCEL! </button>
   
   </form>
   </div>';

}


function dialogEmailCustomer() {

echo '<div id="dialog-modal-email-customer" title="Contact Customer" style="display: none;">

  <form method="post" action="DatabasePosts.php" > 
  <fieldset>
	<table>
	<tr>
	<td> <label for="Customer" > Customer: <label> </th>
    <td >
     <div id="email-label-customerName">
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Email" > Email: <label> </th>
    <td >
     <div id="email-customerID" >
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Subject"> Subject: <label> </th>
    <td >
    <input type="text" size="45" name="subject"  class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td style="vertical-align: top;"> <label for="Message"> Message: <label> </th>
    <td >
    <textarea rows="10" cols="70" name="message"  class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="customer-email" />
  <input type="hidden" name="function" value="emailCustomer"/>
  
  <div align="center">
  <button type="submit" value="Submit"> Send Email! </button>
  </div>
  </form>
 
   </div> ';

}

function dialogOrdersView() {


echo '<div id="dialog-modal-view-order" title="View Order" style="display: none;">
  <form method="post" >
  <fieldset width="90%">
	<table id="printTable">
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="customer"> Customer Name: </label>
	</td>
	<td style="padding-bottom:20px;"> <div id="view-label-order-customerName">
	 </div> </td>
	</tr>	
	<tr>
	<td style="padding-bottom:20px; width:400px;"> <label for="customerEmail"> Customer Email: </label>
	</td>
	<td style="padding-bottom:20px;"> <div id="view-label-order-customerEmail">
	 </div> </td>
	</tr>	
	<tr>
	<td style="padding-bottom:20px; vertical-align: top; width:400px;"> <label for="customerAddress"> Customer Address: </label>
	</td>
	<td style="padding-bottom:20px;"> <div style="width:750px; white-space: pre-wrap;" id="view-label-order-customerAddress">
	 </div> </td>
	</tr>
	<tr >
	<td style="vertical-align: top; padding-bottom:20px; width:400px;"> <label for="Product" > Products: </label> </td>
    <td style="padding-bottom:20px;">
	
	<div  style="width:750px; white-space: pre-wrap;" id="view-label-orderProducts"> </div>
	
   
	</td>
	</tr>
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="dateTime"> Date and Time: </label> </td>
	<td style="padding-bottom:20px;">
		<div id="view-label-dateTime"> </div>
		</td>
	</tr>
	
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="totalPrice"> Total Payment: </label> </td>
	<td style="padding-bottom:20px;">
		<div id="view-label-orderPayment"> </div>
		</td>
	</tr>
		
   </table>
  </fieldset>
  <br/>
  <hr/>
  <a href="javascript:void(null);" onclick="printData();">  <button id="print-order">Print Order</button>  </a>
  
  </form>
 
   </div> ';

}


function dialogOrderStatus() {


echo '<div id="dialog-modal-edit-status" title="Change Order Status" style="display: none;">
  <form method="post" action="DatabasePosts.php" >
  <fieldset>
	<table>
	
	<tr>
	<td>
	<label for="category"> Order Status:</label>
	</td>
	<td>
    <select  style="width:200px;" name="status" id="selectStatus">
		<option value="1">Processing</option>
		<option value="2">Shipped</option>
		<option value="3">Cancelled</option>
		<option value="4"> Refunded </option>
	</select>
	</td>
	</tr>
	
   </table>
  </fieldset>
  
   <input  type="hidden" name="orderID" id="edit-order" /> 
  
  <input type="hidden" name="function" value="editOrderStatus">
  
  <br/>
  
  <div align="center">
  <button type="submit" value="Submit"> SUBMIT! </button>
  </div>
  </form>
 
   </div> ';

}


function dialogCustomerView() {

echo '<div id="dialog-modal-view-customer" title="View Customer" style="display: none;">
  <form method="post" action="DatabasePosts.php" >
  <fieldset>
	<table>
	<tr>
	<td> <label for="Customer" > Customer: </label> </td>
    <td >
     <div id="view-label-customerName">
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Number"> Phone Number: </label> </td>
	<td>
		<div id="view-label-customerNumber"> </div>
		</td>
	</tr>
		<tr>
	<td> <label for="Address" > Address: <label> </td>
    <td >
     <div id="view-label-customerAddress" >
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Email" > Email: <label> </td>
    <td >
     <div id="view-label-customerEmail" >
	 </div>
	</td>
	</tr>
	
	<tr>
	<td> <label for="Subject"> Subject: </label> </td>
    <td >
    <input type="text" size="45" name="subject"  class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td style="vertical-align: top;"> <label for="Message"> Message: </label> </th>
    <td >
    <textarea rows="10" cols="70" name="message"  class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="customer-email" />
  <input type="hidden" name="function" value="emailCustomer"/>
  
  <div align="center">
  <button type="submit" value="Submit"> Send Email! </button>
  </div>
  </form>
 
   </div> ';


}

////////////////////////////////////////////////////////////////////

function showLoginForm(){

echo '<div id="dialog-modal-login" title="Login" style="display: none;">
  <form method="post" action="Admin.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
	<td> <label for="User" > Username: <label> </th>
    <td >
		<input type="text" size="40" name="username" />
	</td>
	</tr>
		<tr>
	<td> <label for="User" > Password: <label> </th>
    <td >
		<input type="password" size="40" name="password" />
	</td>
	</tr>
   </table>
  </fieldset>

  <div align="center">
  <button type="submit" value="Submit"> Login </button>
  </div>
  </form>
 
   </div> ';

}


?>
































