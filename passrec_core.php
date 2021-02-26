<?php 
	require_once('config.php');
	$user = $_POST['user'];
	$pass  = $_POST['pass'];
	$cpass = $_POST['cpass'];
	
	if($pass==$cpass)
		{
			$PassAuthen = md5(sha1($cpass));
			$UserAuthen = md5(sha1($user.$cpass));
			$checkEmail = "SELECT * FROM login_system WHERE Email='$user'";
			$runcheckEmail = mysqli_query($con,$checkEmail);
			
			if($runcheckEmail==true)
				{
					if(mysqli_num_rows($runcheckEmail)===1)
						{
							$UpdateQuery = "UPDATE login_system SET Password = '$PassAuthen', Authenticate='$UserAuthen' WHERE Email = '$user'";
							$runUpdateQuery = mysqli_query($con,$UpdateQuery);
							if($runUpdateQuery==true)
								{
									echo "<b style='color:green'>Password recover successfully!<b>";
								}
						}
					else
						{	
							echo "<b style='color:red'>User not found!<b>";
						}
					}
		
		}
	else
	{
		echo "<b style='color:red'>Password & Confirm-Password did not match!<b>";
	}

?>