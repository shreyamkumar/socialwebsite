<?php  

	$fname = ""; //variable declaration
	$lname = "";
	$em = "";
	$em2 = "";
	$password = "";
	$password2 = "";
	$username ="";
	$profile_pic = "";
	$date = "";
	$error_array = array();
	 if (isset($_POST['reg_button'])) 
	 {
	 	$fname= strip_tags($_POST['reg_fname']); //strips html tags
	 	$fname= str_replace(' ', '', $fname); //replace spaces
	 	$fname= ucfirst(strtolower($fname)); //converts upper to lower case
	 	$_SESSION['reg_fname']= $fname;
	 	$lname= strip_tags($_POST['reg_lname']);
	 	$lname= str_replace(' ', '', $lname);
	 	$lname= ucfirst(strtolower($lname));
	 	$_SESSION['reg_lname']= $lname;

	 	$em= strip_tags($_POST['reg_email1']);
	 	$em= str_replace(' ', '', $em);
	 	$_SESSION['reg_email']= $em;
	 	

		$em2= strip_tags($_POST['reg_email2']);
	 	$em2= str_replace(' ', '', $em2);
	 	$_SESSION['reg_email2']= $em2;
	 	

	 	$password= strip_tags($_POST['reg_password1']);

	 	$password2= strip_tags($_POST['reg_password2']);

	 	$date= date("Y-m-d");

	 	if ($em==$em2) 
	 	{
	 		if (filter_var($em, FILTER_VALIDATE_EMAIL)) 
	 		{
	 			
	 			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

	 			$e_check = mysqli_query($con, "SELECT EMAIL FROM users WHERE email= '$em'");
	 			//number of rows retuned
	 			$num_rows= mysqli_num_rows($e_check);

	 			if ($num_rows>0 )
	 			{
	 				array_push($error_array, "Email already in use<br>") ;
	 			}
	 		}
	 		
	 		else 
	 		{
	 			array_push($error_array, "Invalid format of email<br>");
	 		}	
	 	}

	 	else 
	 	{
	 		array_push($error_array, "Emails don't match<br>");
	 	}	

	 	if (strlen($fname)>25 || strlen($fname)<2) 
	 	{
	 		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
		}

		if (strlen($lname)>25 || strlen($lname)<2) 
		{
			array_push($error_array, "Your last name must be between 2 and 25 characters<br>"); 
	 	}

	 	if ($password != $password2) 
	 	{
	 		array_push($error_array,"Password do not match<br>") ;
	 	}
	 	else 
	 	{
	 		if (preg_match('/[^A-Za-z0-9]/', $password)) 
	 		{
				array_push($error_array,"Password can only contain english or numeric character<br>") ;
	 		}
	 	}

	 	if(strlen($password)>30 || strlen($password)<5)
	 	{
	 		array_push($error_array,"Password must be between 5 to 30 characers<br>"); 
	 	}


	 	if (empty($error_array)) {
	 		$password = md5($password);//Encrypt passowrd n=befoe senf=ding to database

	 		//Generating username using first and last name
	 		$username = strtolower($fname . "_" . $lname);
	 		$check_username= mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
	 		$num= mysqli_num_rows($check_username);
	 		$i = 0;
	 		$temp_username= $username;
	 		while ($num !=0) 
	 		{
	 			$temp_username= $username;
	 			$i++;
	 			$temp_username = $username . "_" . $i;
	 			$check_username =mysqli_query($con, "SELECT username FROM users WHERE username = '$temp_username'");
	 			$num= mysqli_num_rows($check_username);
	 		}
	 		$username= $temp_username;
	 		
	 		$rand = rand(1,16);
	 		$profile_pic = "assets/images/profile_pic/defaults/$rand.png";	
	 	
	 		
		 	$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em','$password', '$date','  $profile_pic', '0', '0', 'no', ',')") ;
		 	
		 	array_push($error_array, "<span style='color:#14C800;'>You are all set! Go ahead and login!</span><br>" );


		 	$_SESSION['reg_fname']= "";
		 	$_SESSION['reg_lname']= "";
		 	$_SESSION['reg_email']= "";
		 	$_SESSION['reg_email2']= "";
	    }
	 	
	 }
?>