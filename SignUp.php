<?php 

    // First we execute our common code to connection to the database and start the session 
    require('common.php'); 
	$errors = array();
	$p =& $_POST;
	

   
    $signup_ok =0;
	
	
	    if(!empty($_POST)) 
	    { 
		
		
	
	        // Ensure that the user has entered a non-empty username 
	        if(empty($_POST['username'])) 
	        { 

				$errors[] = 'You must enter a username.';

	        } else{
	        	
				++$signup_ok;

	        }
			

	        if(empty($_POST['email'])) 
	        { 

				$errors[] = 'You must enter a Email.';
				//$signup_ok =false;	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			

	        if(empty($_POST['password'])) 
	        { 
	            //die("Please enter a password."); 
				$errors[] = 'You must enter a password.';
				//$signup_ok =false;
	        }  else{
	        	
				++$signup_ok;

	        }
			

	        if(empty($_POST['Title'])) 
	        { 
	            //die("Please enter a Title."); 
				$errors[] = 'You must enter a Title.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			
		
	        // Ensure that the user has entered a non-empty FirstName 
	        if(empty($_POST['FirstName'])) 
	        { 
	            //die("Please enter a FirstName."); 
				$errors[] = 'You must enter a FirstName.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
		
	        // Ensure that the user has entered a non-empty LastName 
	        if(empty($_POST['LastName'])) 
	        { 
	           // die("Please enter a LastName."); 
				$errors[] = 'You must enter a LastName.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			
		
        
		
	        // Ensure that the user has entered a non-empty PhoneNumber 
	        if(empty($_POST['PhoneNumber'])) 
	        { 
	           // die("Please enter a PhoneNumber."); 
				$errors[] = 'You must enter a PhoneNumber.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			
		
	        // Ensure that the user has entered a non-empty Address1 
	        if(empty($_POST['Address1'])) 
	        { 
	//die("Please enter a Address1."); 
				$errors[] = 'You must enter a Address1.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			
		
       
		
	        // Ensure that the user has entered a non-empty City 
	        if(empty($_POST['City'])) 
	        { 
	           // die("Please enter a City."); 
				$errors[] = 'You must enter a City.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
		
	        // Ensure that the user has entered a non-empty PostCode 
	        if(empty($_POST['PostCode'])) 
	        { 
	            //die("Please enter a PostCode."); 
				$errors[] = 'You must enter a PostCode.';
				//$signup_ok =false;
	        } else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
		

	        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	        { 
	           // die("Invalid E-Mail Address");
				$errors[] = 'Invalid E-Mail Address';
				//$signup_ok =false;
			
	        }  else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
         

	        $query = " 
	            SELECT 
	                1 
	            FROM customers
	            WHERE 
	                username = :username 
	        "; 
         

	        $query_params = array( 
	            ':username' => $_POST['username'] 
	        ); 
         
	        try 
	        { 
	            // These two statements run the query against your database table. 
	            $stmt = $db->prepare($query); 
	            $result = $stmt->execute($query_params); 
	        } 
	        catch(PDOException $ex) 
	        { 

				$errors[] ="Failed to run query: " . $ex->getMessage();
				//$signup_ok =false;
			 
	        } 
         

	        $row = $stmt->fetch(); 
         

	        if($row) 
	        { 

				$errors[] = 'This username is already in use'; 

			 
	        }  else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
         

	        $query = " 
	            SELECT 
	                1 
	            FROM customers 
	            WHERE 
	                email = :email 
	        "; 
         
	        $query_params = array( 
	            ':email' => $_POST['email'] 
	        ); 
         
	        try 
	        { 
	            $stmt = $db->prepare($query); 
	            $result = $stmt->execute($query_params); 
	        } 
	        catch(PDOException $ex) 
	        { 

				$errors[] = 'Failed to run query: " . $ex->getMessage()';
				//$signup_ok =false;
			 
	        } 
         
	        $row = $stmt->fetch(); 
         
	        if($row) 
	        { 
	            //die("This email address is already registered"); 
				$errors[] = 'This email address is already registered';
				//$signup_ok =false;
			 
	        }  else{
	        	
				++$signup_ok;
				//echo $signup_ok;
	        }
			
			
		if( $signup_ok == 13){
        $query = " 
            INSERT INTO customers ( 
                username, 
                password, 
                salt,
				title,
				firstName,
				lastName,
                email, 
				phoneNumber,
				addressLine1,
				addressLine2,
				addressCity,
				addressPostal
            ) VALUES ( 
                :username, 
                :password, 
                :salt,  
				:Title,
				:FirstName,
				:LastName,
				:email,
				:PhoneNumber,
				:Address1,
				:Address2,
				:City,
				:PostCode
            ) 
        "; 
		
		echo '<script type="text/javascript"> alert($query); </script>';
         

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         

        $password = hash('sha256', $_POST['password'] . $salt); 
         

        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 

        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'],
				':Title' => $_POST['Title'],
				':FirstName'=> $_POST['FirstName'],
				':LastName'=> $_POST['LastName'],
				':PhoneNumber'=> $_POST['PhoneNumber'],
				':Address1'=> $_POST['Address1'],
				':Address2'=> $_POST['Address2'],
				':City'=> $_POST['City'],
				':PostCode'=> $_POST['PostCode']
				
        ); 
         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 

			$errors[] = "Failed to run query: " . $ex->getMessage();
        } 
         

        header("Location: login.php"); 

		 die("Redirecting to login.php"); 
 }
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


	 
	 


<!-- middle section (PAGE CONTENT)-->



		 <div class="center_content" style="clear:both; margin-left:20%; margin-right:20%; width:600px; ">
			 				 
			 
		<div class="login-card">
			  <h1>Register for an Account</h1><br>
			  
			<?php if(!empty($errors)){ ?>
				<?php
				     if (count ($errors) > 0) {
				          $n = count ($errors);
						  echo "<table >";
						  
				          for ($i = 0; $i < $n; $i++){
				               echo  '<tr>'; 
							   echo  '<td><br /><font color="red">' .'- '.$errors[$i]  .  '</font></td>';
							   echo  '</tr>';
				          }  
						  
						  echo "</table>";   
				     }
				?>
				
				<?php } ?>
			  
			  <br/>
			  <br/>
			    <form   action="SignUp.php" method="post">
			<input type="text" name="username" placeholder="username "
			value="<?php if (isset ($p['username'])) print $p['username']; ?>"
			>	
			<input type="text" name="Title" placeholder="Title "
			value="<?php if (isset ($p['Title'])) print $p['Title']; ?>"
			>
			<input type="text" name="FirstName" placeholder="First Name"
			value="<?php if (isset ($p['FirstName'])) print $p['FirstName']; ?>"
			>
			<input type="text" name="LastName" placeholder="Last Name"
			value="<?php if (isset ($p['LastName'])) print $p['LastName']; ?>"
			>
			<input type="text" name="email" placeholder="Email"
			value="<?php if (isset ($p['email'])) print $p['email']; ?>"
			>
			<input type="text" name="PhoneNumber" placeholder="Phone Number"
			value="<?php if (isset ($p['PhoneNumber'])) print $p['PhoneNumber']; ?>"
			>
			<input type="text" name="Address1" placeholder="Address Line 1"
			value="<?php if (isset ($p['Address1'])) print $p['Address1']; ?>"
			>
			<input type="text" name="Address2" placeholder="Address Line 2"
			value="<?php if (isset ($p['Address2'])) print $p['Address2']; ?>"
			>
			<input type="text" name="City" placeholder="City"
			value="<?php if (isset ($p['City'])) print $p['City']; ?>"
			>
			
			<input type="text" name="PostCode" placeholder="Post Code"
			value="<?php if (isset ($p['PostCode'])) print $p['PostCode']; ?>"
			>
			
			<input type="password" name="password" placeholder="Password"
			value="<?php if (isset ($p['password'])) print $p['password']; ?>"
			>
			
			
			
		    <input type="submit" name="SignUp" class="login login-submit" value="Sign Up">
					  

					  <div class="login-help">
					    <a href="#">Forgot Password</a>
					  </div>
					  <input type="hidden" name="__process_form__" value="1" />
					  </form>
					</div>





<!-- end of page content (MIDDLE CONTENT)-->



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
