<?php
	session_start();
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue;">
  
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
		<a href="login.php"><button type="button" class="back_btn"><< Back to Login</button></a>
  
</body>
</html>