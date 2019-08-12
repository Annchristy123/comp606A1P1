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
	<center><h2>Reset Password Form</h2></center>
			
		<form action="resetpassword.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter Username or email" name="username" required>
				<input type="password" placeholder="Enter Password" name="password" required>
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
				<button class="sign_up_btn" name="reset" type="submit">Reset Password</button>
			</div>
		</form>
		
		<?php
			if(isset($_POST['reset']))
			{
				$username=$_POST['username'];
				
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from users where username='$username' or email='$username'";
					//echo $query;
                    $query_run = mysqli_query($db,$query);
                    if($query_run){
                        $query1 = "update users set password='$password' where username='$username' or email='$username'";
                        $query_run = mysqli_query($db,$query1);
                        header("location:login.php");
                    }
                    else{
                        echo '<script type="text/javascript">alert(This username not exists. Please try later</script>';
                    }

                }
                else{
                    echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';

                }
            }
			
		?>
		
	</div>
</body>
</html>