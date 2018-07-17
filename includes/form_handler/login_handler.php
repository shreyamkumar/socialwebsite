<?php 
if (isset($_POST['login_button'])) {
	$email= filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
	$_SESSION['log_email']= $email;
	$password = md5($_POST['log_password']);

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email= '$email' AND password= '$password'");
	$checK_login_query = mysqli_num_rows($check_database_query);

	if($checK_login_query == 1)
	{
		$row = mysqli_fetch_array($checK_database_query);
		$username= $row['username'];

		$check_user_closed = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND user_closed='yes'");
		if(mysqli_num_rows($check_user_closed) == 1){
			$reopen_account = mysqli_query($con, "UPDATE users SET user_closed= 'no' WHERE email='$email'");
		}

		$_SESSION['username']= $username;
		header("Location: index.php");
		$_SESSION['log_email']= "";
		exit();
	}

	else
	{
		array_push($error_array, "<span style='color:red;'> Email or Password is incorrect</span>");
	}
}

?>