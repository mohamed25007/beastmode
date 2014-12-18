<?php ob_start(); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<title>Admin Control Panel</title>
	<!-- IMPORT JQUERY UI -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  
  <!-- IMPORT OF JQUERY FUNCTIONS -->
  <script type="text/javascript" src="JQueryFunctions.js"></script>

 <link rel="stylesheet" type="text/css" href="AdminCP.css">
  
  
</head>
<body >

<?php 
		require "dialogDraws.php";
		
		if (isset($_POST['username']) && isset($_POST['password'])){
		
		if ($_POST['username'] == $_SERVER['CP_USER'] )//&& password_verify($_POST['password'],$_SERVER['CP_PASS'])) 
		{ //USING BCRYPT AND COST OF 12		
		
		session_start();
		$_SESSION['user'] = $_POST['username'];
		
		echo '<script type="text/javascript">
		alert("Login Succesful!");
		window.location.href="AdminPanel.php";
		</script>';
		die();
		
		
		} else {
				
		echo '<script type="text/javascript">
		alert("Login Failed!");
		window.location.href="Admin.php";
		</script>';
		die();
		
		}
	
		}
		else	{
		
		showLoginForm();
		echo '<script type="text/javascript">
		showLoginDialog(); </script>';
		die(); 
		}
		
		
		?> 


</body>
</html>

