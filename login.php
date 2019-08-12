<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#bdc3c7">
<div class="main-block">
</div>
	<div id="main-border">
	<center><h2>Login Form</h2></center>
			
		<form action="login.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter Username or email" name="username" required>
				<input type="password" placeholder="Enter Password" name="password" required>
				<a href="resetpassword.php" class="reset_pwd">Forgotten Password</a>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Register</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				
				@$password=$_POST['password'];
				$query = "select * from users where username='$username' or email='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($db,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: form.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>