<?php 

require 'config/config.php';
require 'includes/form_handler/register_handler.php';
require 'includes/form_handler/login_handler.php';



?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Swirlfeed</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<div class="wrapper">

				<div class="login_box">
			<div class="login_header">
				<h1>Name</h1>
				<span>Log in or Sign up below!</span>
			</div>

			<div class="first">

				<form action="register.php" method="POST">
					
					<input type="email" name="log_email" placeholder="Email Address" value=
					"<?php 
					if(isset($_SESSION['log_email']))
					{
						 echo $_SESSION['log_email'];
					} ?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Password" required>
					<br>
					<?php if(in_array("<span style='color:red;'> Email or Password is incorrect</span>", $error_array)) 
							echo "<span style='color:red;'> Email or Password is incorrect</span>"?><br>
					<input type="submit" name="login_button" value="Log in" >
					
					 <br>
					 <a href="#" id-=signup" class="signup">Need an account? Register here!</a>
			    </form>
				

			</div>
		
			<div class="second">
				<form action="register.php" method="POST">
				
				<input type="text" name="reg_fname" placeholder="First Name" value=
					"<?php 
					if(isset($_SESSION['reg_fname']))
					{
						 echo $_SESSION['reg_fname'];
					} ?>" required>
					<br>
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) 
							echo "Your first name must be between 2 and 25 characters<br>";
					?>
					<input type="text" name="reg_lname" placeholder="Last Name"  value="<?php 
					if(isset($_SESSION['reg_lname']))
					{
						 echo $_SESSION['reg_lname'];
					} ?>" >
					<br>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) 
							echo "Your last name must be between 2 and 25 characters<br>";
					?>
					<input type="email" name="reg_email1" placeholder="Email"  value=
					"<?php 
					if(isset($_SESSION['reg_email']))
					{
						 echo $_SESSION['reg_email'];
					} ?>" required>
					<br>
					<input type="email" name="reg_email2" placeholder="Confirm Email"  value=
					"<?php 
					if(isset($_SESSION['reg_email2']))
					{
						 echo $_SESSION['reg_email2'];
					} ?>" required>
					<br>
					<?php if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>";
						  elseif(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>";
					      elseif(in_array("Invalid format of email<br>", $error_array)) echo "Invalid format of email<br>";
					     
					?>

					
					<input type="password" name="reg_password1" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>

					<?php 
					      if(in_array("Password do not match<br>", $error_array)) 
					      	echo "Password do not match<br>";
						  elseif(in_array("Password must be between 5 to 30 characers<br>", $error_array)) 
					      	echo "Password must be between 5 to 30 characers<br>";
					      elseif(in_array("Password can only contain english or numeric character<br>", $error_array)) 
						  	echo "Password can only contain english or numeric character<br>";
					?>

					
					<input type="submit" name="reg_button" value="Register"  >
					<br>
					<?php if(in_array("<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>" , $error_array)) echo "<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>" ; ?>
						<a href="#" id-=signin" class="signin">Already have an account? Sign in here!</a>
			</form>

			</div>
			
		</div>
	</div>

</body>
</html>