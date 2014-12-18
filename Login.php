<?php 
    require('common.php');     
    
    $submitted_username = '';    

    if(!empty($_POST)) 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM customers 
            WHERE 
                username = :username 
        "; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
             
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        
        $login_ok = false; 
         
        
        $row = $stmt->fetch(); 
        if($row) 
        { 
            
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                // If they do, then we flip this to true 
                $login_ok = true; 
            } 
        } 
         
        
        if($login_ok) 
        { 
            
            unset($row['salt']); 
            unset($row['password']); 			
             
            
            $_SESSION['user'] = $row; 
             $_SESSION['userID'] = $row['id'];
            // Redirect the user to the private members-only page. 
            header("Location: UserPage.php"); 
            die("Redirecting to: UserPage.php"); 
        } 
        else 
        { 

			$errors = array();
			$p =& $_POST;
   
			if (count ($p) > 0){
			     if (!isset ($p['username']) || (trim ($p['username']) == '')){
			          $errors[] = 'You must enter a username.';
			     }
     
			     if (!isset ($p['password']) || (trim ($p['password']) == '')){
			          $errors[] = 'You must enter a password.';
			     }
     
			     
			}else{
				$errors[] = 'username or password is incorrect';
			}
             

            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
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



		 <nav id="nav" style="padding-top:3em; padding-bottom: 6em;">
			 <ul>
				 <li>
							<div class="login-card">
			  <h1>Log-in</h1><br>
			    
				<?php if(!empty($errors)){ ?>
					<?php
					     if (count ($errors) > 0) {
					          $n = count ($errors);
							  echo "<table><col width='70%' />";
							  echo ""; 
					          for ($i = 0; $i < $n; $i++){
					               echo  '<tr><td>'. '<br /><font color="red">' .$errors[$i]  .  '</font>' .'</tr></td>';
					          }  
							  
							  echo "</table>";   
					     }
					?>
					
					<?php } ?>
					
					<form action="Login.php" method="post"> 
			      <input type="text" name="username" placeholder="Username" value="<?php if (isset ($p['username'])) print $p['username']; ?>">
				  <input type="password" name="password" placeholder="Password" value="<?php if (isset ($p['password'])) print $p['password']; ?>">
				  <input type="submit" name="login" class="login login-submit" value="Login">
					 

					  <div class="login-help">
					    <a href="SignUp.php">Register</a> • <a href="#">Forgot Password</a>
					  </div>
					  <input type="hidden" name="__process_form__" value="1" />
					
					 </form>
					 </div>
						</li>
						<li>
			<p style="padding:1cm; border-right:1px solid #BCBCBC; height:250px;">
			</p>
						</li>
					<li style="vertical-align: top; margin-left:2em;">											
				<p style="padding-top:4em; margin-bottom: 3em;font-size:1.5em; width:300px; word-wrap: break-word;"> If you have not got an account, but would like one
				click this button to go to the sign up page. </p>	
				<br/>	
				
				<a href="SignUp.php" class="login login-submit" style="color:#FFFFFF; ">
						Click here to register																								
				</a>
				
				</li>
						</ul>
				</nav>





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
