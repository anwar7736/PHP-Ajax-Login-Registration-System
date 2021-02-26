<?php 
	require_once('config.php');
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	if($pass==$cpass)
		{
			$PassAuthen = md5(sha1($cpass));
			$UserAuthen = md5(sha1($email.$cpass));
			$SelectQuery = "SELECT * FROM signup_form WHERE Email = '$email' || Phone = '$phone'";
			$runSelectQuery = mysqli_query($con,$SelectQuery);
			
			if($runSelectQuery==true)
				{
					if(mysqli_num_rows($runSelectQuery)===1)
						{
							echo "<b style='color:green'>Your are already registered!<b>";
						}
					else
						{
							$InsertQuery = "INSERT INTO signup_form(Name,Email,Phone,Password,Authenticate)VALUES('$name','$email','$phone','$PassAuthen','$UserAuthen')";
							$runInsertQuery = mysqli_query($con,$InsertQuery);
							
							if($runInsertQuery==true)
								{
									echo "<b style='color:green'>Registration successfully!<b>";
								}
						}
					
				}
			
		}
		else
			{
				echo "<b style='color:red'>Password & Confirm-Password did not match!<b>";
			}



?>