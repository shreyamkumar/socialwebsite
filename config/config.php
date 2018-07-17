<?php 
ob_start();

session_start();

$timezone = date_default_timezone_set("Asia/Kolkata");

$con=mysqli_connect("localhost","root","","social");//conection variable
if(mysqli_connect_errno())
{
	echo "Failed to conect:". mysqli_connect_errno();
}
?>