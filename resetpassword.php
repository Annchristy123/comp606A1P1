<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
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
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
				<button class="reset_button" name="reset" type="submit">Reset Password</button>
			</div>
		</form>
		
		<?php
			if(isset($_POST['reset']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "update users set password='$password' where username='$username'";
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