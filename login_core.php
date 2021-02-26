<?php 
	require_once('config.php');
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$remind = $_POST['remind'];
	
	$UserAuthen = md5(sha1($user.$pass));
	
	$checkQuery = "SELECT * FROM login_system WHERE Authenticate='$UserAuthen'";
	$runcheckQuery = mysqli_query($con,$checkQuery);
	
	if($runcheckQuery==true)
	{
	if(mysqli_num_rows($runcheckQuery)===1)
	{
		if($remind==true)
		{
			setcookie("username",$user,time()+(86400*7));
			setcookie("password",$pass,time()+(86400*7));
		}
		else
		{
			setcookie("username","");
			setcookie("password","");
		}
		setcookie("CurrentUser",$UserAuthen,time()+(86400*7));
		header("location:index.php");
	}
		
	}
	
?>