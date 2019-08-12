<?php
	session_start();
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#bdc3c7">
<div class="main-block">
</div>
	<div id="main-border">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="main-form">
				<input type="text" placeholder="Enter Username" name="username" required>
				<input type="text" placeholder="Enter email" name="email" required>
				<input type="password" placeholder="Enter Password" name="password" required>
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				<a href="login.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		<?php
			if(isset($_POST['register']))
			{	
				echo $_POST['register'];
				$username=$_POST['username'];
				$email1=$_POST['email'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from users where username='$username'";
					//echo $query;
				$query_run = mysqli_query($db,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into users values('$username','$email1','$password')";
							$query_run = mysqli_query($db,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								$_SESSION['email']=$email1;
								header( "Location: login.php");
							}
							else
							{
								echo '<script type="text/javascript">alert(Registration Unsuccessful due to server error. Please try later</script>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>