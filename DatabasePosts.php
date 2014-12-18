<?php
error_reporting(0); 
//// REMEMBER TO STORE DETAILS IN ROOT DIRECTORY

$db = new PDO('mysql:host='.$_SERVER['DB_HOST'].';dbname='.$_SERVER['DB_NAME'].';charset=utf8', $_SERVER['DB_USER'], $_SERVER['DB_PASS']);


$host   =   $_SERVER['DB_HOST']  ;
$user   =   $_SERVER['DB_USER']  ;
$pass   =   $_SERVER['DB_PASS']  ;
$db1   =   $_SERVER['DB_NAME'] ;


//$db = new PDO('mysql:host=localhost;dbname=test2;charset=utf8', 'root', '');
 
 $connectto = mysql_connect($host, $user, $pass);
  $isLogged = false;
if (!$connectto) {
    die('Not connected : ' . mysql_error());
}
  $db_selected  =  mysql_select_db($db1, $connectto);
  
  

if(  (isset($_REQUEST['CatView'])) and  ($_REQUEST['CatView']  != "" )      ) {
 
$id = $_REQUEST['CatView'];

$sql = "DELETE FROM categories WHERE CatID = :id";
$refer = $_SERVER['HTTP_REFERER'];
try {
    $STH = $GLOBALS["db"]->prepare($sql); 
	$STH->bindParam(":id", $id);	
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Category Succesfully Deleted!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}


}

if(  (isset($_REQUEST['ManuView'])) and  ($_REQUEST['ManuView']  != "" )      ) {

	 $sqlDel = "DELETE FROM manufactures WHERE manufactureId = ".$_REQUEST['ManuView'];
	 mysql_query($sqlDel) or die("Error".mysql_error());

		echo '<script language="javascript">';
		echo "window.alert('Manufacturer Succesfully Deleted!'); window.location.href='".$refer."';";
		echo '</script>';

}


if(isset($_POST['function'])) {

$function = $_POST['function'];

	switch ($function) {
    case "addNewProduct":
        addNewProduct();
        break;
    case "deleteProduct":
        deleteProduct();
        break;
    case "editProduct":
        editProduct();
		break;
	case "editCustomer":
		editCustomer();
        break;
	case "emailCustomer":
		emailCustomer();
		break;
	case "deleteCustomer":
		deleteCustomer();
		break;
	case "editOrderStatus":
		editOrderStatus();
		break;
	case "imagesUpload":
		imagesUpload();
		break;
	case "addNewCategory":
        addNewCategory();
        break;
	case "addNewManufacture":
        addNewManufacture();
        break;	
	case "addProductImages":
        addProductImages();
        break;	
	case "addorder":
        addorder();
	case "emailWebMaster";
		emailWebMaster();
        break;	

}

$function = null;

}
function addorder() {
	$product='';
	$total=0;
	if(isset($_SESSION['cart_products'])){
				$session=$_SESSION['cart_products'];
				$next_id=$session['next_id'];
				
				for($i=0;$i<$next_id;$i++){
				
			$amount=$session[$i]['qty']*$session[$i]['price'];
			$product.=$session[$i]['name'].'('.$session[$i]['qty'].'),';
			$total+= $amount;
	}	
	$dat=date("Y-m-d");
	$tim=date("G:i:s");
 	$sql = "INSERT INTO productorders (productQuantityArray,date,time,totalPrice,statusID) VALUES ('$product','$dat','$tim',$total,0);"; 
// die;
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}


return $GLOBALS["db"]->lastInsertId();
}else{echo '<script language="javascript">';
	echo "window.alert('no product selected in shopping cart'); window.location.href='index.php';";
	echo '</script>';
	die();}
}
function getorder($order_id) {
     $result =mysql_query("SELECT * FROM `productorders` where id= $order_id"); 
     return $result;
	 }
function deleteorder($order_id) {
     $result =mysql_query("Delete FROM `productorders` where id= $order_id and statusID = 0"); 
	 }
 ///////////////////////////////
/* Product related functions */
function getlatestproduct() {
     $result =mysql_query("SELECT * FROM `products` ORDER BY `id` DESC limit 1"); 
     return $result;
  }
    function getspecialproduct() {
     $result =mysql_query("SELECT * FROM `products` WHERE `special` =1 ORDER BY rand() DESC limit 2"); 
     return $result;
  }
  
   function getfeaturesproduct() {
	 $where='';
	 if(isset( $_SESSION['featured_category']) and  $_SESSION['featured_category'] !="")
	 {
	 $where=' where categoryID="'.$_SESSION['featured_category'].'"';
	 }
     $result =mysql_query("SELECT * FROM `products` ".$where." ORDER BY rand() DESC limit 3"); 
     return $result;
  }
  
  function getlatest() {
     $result =mysql_query("SELECT * FROM `products` ORDER BY `id` DESC limit 6"); 
     return $result;
}
function getproductdetails($product_id) {
     $result =mysql_query("SELECT * FROM `products` WHERE `id` =".$product_id."  ORDER BY `id` DESC limit 6"); 
    return mysql_fetch_array($result);
}

 function getallproductimages($productID) {
 $sql="SELECT pictureLink FROM `picturearrays` WHERE productID=".$productID;
     $result =mysql_query($sql); 
     return mysql_fetch_array($result);
  }

 function getFirstProductImages($productID) {
 	 $sql="SELECT imageName FROM  productimages WHERE ProdID=".$productID."  LIMIT 1  ";
     //$result =mysql_query($sql); 
     //return mysql_fetch_array($result);
	 
	 $result =mysql_query($sql); 
     $rec = mysql_fetch_array($result);
	 $image = $rec['imageName'];
	 return $image;
	 
  }


function addNewProduct(){
$name = $_POST['name'];

$product_id = $_POST['product_id'];
$special = $_POST['special'];
$manufacturer = intval($_POST['manufacturer']);
$description = $_POST['description'];
$category = intval($_POST['category']);
$price = $_POST['price'];
$specification = $_POST['specification'];
$delivery = $_POST['delivery'];


$sql = "INSERT INTO products (name,manufactureId,special,description,categoryID,price,specification,delivery_charges,product_id)
 					VALUES (:name,:manufacturer,:special,:description,:category,:price,:specification,:delivery,:product_id)";
$refer = $_SERVER['HTTP_REFERER'];
 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":product_id", $product_id);
	$STH->bindParam(":name", $name);
	$STH->bindParam(":special",$special);
	$STH->bindParam(":manufacturer",$manufacturer);
	$STH->bindParam(":description", $description);
	$STH->bindParam(":category", $category);
	$STH->bindParam(":price", $price);
	$STH->bindParam(":specification", $specification);
	$STH->bindParam(":delivery", $delivery);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Added!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
 


}

function deleteProduct(){

$id = $_POST['productID'];

$sql = "DELETE FROM products WHERE id=:id";
$refer = $_SERVER['HTTP_REFERER'];
try {
    $STH = $GLOBALS["db"]->prepare($sql); 
	$STH->bindParam(":id", $id);	
	$STH->execute();
		echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Deleted!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function editProduct(){

$id = $_POST['pid'];
$product_id = $_POST['product_id'];
$name = $_POST['name'];
$special = $_POST['special'];
$manufacturer = $_POST['manufacturer'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$specification = $_POST['specification'];
$delivery = $_POST['delivery'];
//$sql = "UPDATE products SET name = '$name',special = '$special',manufactureId = '$manufacturer',description = '$description',categoryID= '$category',price= '$price',specification= '$specification',delivery_charges = '$delivery'  WHERE id = '$id';";
 		

$sql = "UPDATE products SET name = :name,special = :special,manufactureId = :manufacturer,description = :description,categoryID= :category,price= :price,specification= :specification,delivery_charges = :delivery ,product_id = :product_id  WHERE id = :id;";
 		
$refer = $_SERVER['HTTP_REFERER'];
 try {
    $STH = $GLOBALS["db"]->prepare($sql); 
     
	$STH->bindParam(":product_id", $product_id, PDO::PARAM_STR);
	$STH->bindParam(":id", $id, PDO::PARAM_STR);
	$STH->bindParam(":name", $name, PDO::PARAM_STR);
	$STH->bindParam(":special",$special, PDO::PARAM_STR);
	$STH->bindParam(":manufacturer",$manufacturer, PDO::PARAM_STR);
	$STH->bindParam(":description", $description, PDO::PARAM_STR);
	$STH->bindParam(":category", $category, PDO::PARAM_STR);
	$STH->bindParam(":price", $price, PDO::PARAM_STR);
	$STH->bindParam(":specification", $specification, PDO::PARAM_STR);
	$STH->bindParam(":delivery", $delivery, PDO::PARAM_STR);
	$STH->execute();
//print_r($STH);die;
	echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Updated!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}


}

function editPictures(){

$id = $_POST['productID'];

for ($x = 1; $x <= 5; $x++) {

if (isset($_POST['pictureLink'.$x]) && !empty($_POST['pictureLink'.$x])) {

$link = $_POST['pictureLink'.$x];

$sql = "INSERT INTO picturearrays (productID,pictureLink,pictureNum) VALUES (:id,:link,:number)";

 try {
    $STH = $GLOBALS["db"]->prepare($sql); 
	$STH->bindParam(":id",$id);
	$STH->bindParam(":link", $link);
	$STH->bindParam(":number",$x);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
} // END CATCH

} // END IF

} // END FOR
	$refer = $_SERVER['HTTP_REFERER'];
	echo '<script language="javascript">';
	echo "window.alert('Picture(s) Succesfully Updated!'); window.location.href='".$refer."';";
	echo '</script>';
	die();

}

function addNewManufacture() {
	$refer = $_SERVER['HTTP_REFERER'];	
	$name = $_POST['name'];
	$sql = "INSERT INTO manufactures (ManufactureName) VALUES (:name);"; 
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":name", $name);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Manufacturer Succesfully Added!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

} 

function addNewCategory() {
//echo 'b';die;
	$refer = $_SERVER['HTTP_REFERER'];	
	$name = $_POST['name'];
	$sql = "INSERT INTO categories (CatName) VALUES (:name);"; 
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":name", $name);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Category Succesfully Added!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	

}

function addProductImages() {

require_once('ImageManipulator.php'); // image resizing file
$productID = $_REQUEST['pid'];


$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 3024*100; //Maximum image size limit
$path = "ProductImages/"; // Upload directory
$count = 0;



if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to execute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	
			//echo $_FILES["files"]["tmp_name"][$f]; echo "<br>";	//echo $_FILES["files"]["name"][$f]; echo "<br>";
	
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
							if ($_FILES['files']['size'][$f] > $max_file_size) {
								$message[] = "$name is too large!.";
								continue; // Skip large files
							}
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 


        $newNamePrefix = time() . '_';
        $manipulator = new ImageManipulator($_FILES['files']['tmp_name'][$f]);
        // resizing to 200x200
        $newImage = $manipulator->resample(400, 280);
        // saving file to uploads folder
        $manipulator->save('ProductImages/' . $newNamePrefix . $_FILES['files']['name'][$f]);
		$imageName = $newNamePrefix . $_FILES['files']['name'][$f];
			
	            	$count++; // Number of successfully uploaded files
					
					 $sql = "Insert into productimages set imageName ='".$imageName."', ProdID = $productID  ";
					 mysql_query($sql) or die("Error in insertion: ".mysql_error()); 

					
	        }
	  
	  
	   }
	} //foreach

}


		$refer = $_SERVER['HTTP_REFERER'];
		
		echo '<script language="javascript">';
		echo "window.alert('Images Added Successfully!'); window.location.href='".$refer."';";
		echo '</script>';



}




 function getCatgoryName($catID) {
	 $id = $catID;
 
	$sql = "SELECT CatName FROM `categories` WHERE CatID = :id  "; 
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id", $id);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	
	 return $STH->fetchAll();
	 
}

 function getManufactureName($manufactureId) {
	 
	 $id = $manufactureId;
 
	$sql = "SELECT ManufactureName FROM `manufactures` WHERE manufactureId = :id ";
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id", $id);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	
	 return $STH->fetchAll();
	 
}


 function getCatgoryProducts($catID) {
 
	 $id = $catID;
 
	$sql = "SELECT * FROM `products` WHERE categoryID = :id  "; 
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id", $id);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	
	 return $STH->fetchAll();
	 
}

function getSearchProducts($query){

$keyword = $query;

$sql = "SELECT * FROM `products` WHERE name LIKE '%".$keyword."%' or product_id LIKE '%".$keyword."%'; ";


	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	
	 return $STH->fetchAll();


}

 function getManufacturerProducts($catID) {
 
	$id = $catID;
 
	$sql = "SELECT * FROM `products` WHERE manufactureId = :id  "; 
 
	try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id", $id);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
	
	 return $STH->fetchAll();
}


 ////////////////////////////////
/* Customer related functions */

function editCustomer(){
$refer = $_SERVER['HTTP_REFERER'];

$id = $_POST['customerID'];
$Title = $_POST['customerTitle'];
$FName = $_POST['customerFName'];
$LName = $_POST['customerLName'];
$Email = $_POST['customerEmail'];
$Number = $_POST['customerNumber'];
$AddressLine1 = $_POST['customerAddressLine1'];
$AddressLine2 = $_POST['customerAddressLine2'];
$AddressCity = $_POST['customerAddressCity'];
$AddressPostal = $_POST['customerAddressPostal'];



$sql = "UPDATE customers SET title = :title,firstName = :FName,lastName = :LName,
email = :Email,phoneNumber = :Number,addressLine1 = :AddressLine1,addressLine2 = :AddressLine2,
addressCity = :AddressCity,addressPostal = :AddressPostal WHERE id = :id;";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->bindParam(":title",$Title);
	$STH->bindParam(":FName", $FName);
	$STH->bindParam(":LName",$LName);
	$STH->bindParam(":Email", $Email);
	$STH->bindParam(":Number", $Number);
	$STH->bindParam(":AddressLine1", $AddressLine1);
	$STH->bindParam(":AddressLine2", $AddressLine2);
	$STH->bindParam(":AddressCity", $AddressCity);
	$STH->bindParam(":AddressPostal", $AddressPostal);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Customer Succesfully Updated!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function deleteCustomer(){
$refer = $_SERVER['HTTP_REFERER'];

$id = $_POST['customerID'];

$sql = "DELETE FROM customers WHERE id=:id";

try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Customer Succesfully Deleted!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}


function emailWebMaster(){
$refer = $_SERVER['HTTP_REFERER'];
$to = 'DILIPS EMAIL';
$msg = $_POST['messege'];
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['telephone'];
$subject = $_POST['subject'];
$headers = "From: Admin@Dillips.com";

$msg = $name.'has emailed you saying: '.$msg.' You can contact them on'.$number
.'or '.$email;

$msg = wordwrap($msg,70);


if (mail($to,$subject,$msg,$headers)){
	echo '<script language="javascript">';
	echo "window.alert('Email Succesfully Sent!'); window.location.href='".$refer."';";
	echo '</script>';
	} else {
	echo '<script language="javascript">';
	echo "window.alert('ERROR! Contact Web Administrators'); window.location.href='".$refer."';";
	echo '</script>';
	}

}

function emailCustomer(){
$refer = $_SERVER['HTTP_REFERER'];
$to = $_POST['customer-email'];
$msg = $_POST['message'];
$subject = $_POST['subject'];
$headers = "From: Admin@Dillips.com";

$msg = wordwrap($msg,70);


if (mail($to,$subject,$msg,$headers)){
	echo '<script language="javascript">';
	echo "window.alert('Email Succesfully Sent!'); window.location.href='".$refer."';";
	echo '</script>';
	} else {
	echo '<script language="javascript">';
	echo "window.alert('ERROR! Contact Web Administrators'); window.location.href='".$refer."';";
	echo '</script>';
	}

}

//// ORDER FUNCTION

function editOrderStatus(){
$refer = $_SERVER['HTTP_REFERER'];
$id = $_POST['orderID'];
$status = $_POST['status'];

$sql = "UPDATE productorders SET statusID = :status WHERE id = :id;";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->bindParam(":status",$status);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Order Status Succesfully Updated!'); window.location.href='".$refer."';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function imagesUpload(){

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 800000) // 800kb file limit
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}

}

?>





















