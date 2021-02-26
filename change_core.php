 <?php 
 session_start();
 require_once('config.php');
	 
	 $CurrentUser= $_COOKIE['CurrentUser'];
		 
		 
	 $oldpass = $_POST['opass'];
	 $newpass = $_POST['npass'];
	 $cpass =  $_POST['cpass'];
	 $oldpassAuth = md5(sha1($oldpass));
	 
		$checkUser = "SELECT * FROM login_system WHERE Authenticate = '$CurrentUser'";
		$runCheckQuery = mysqli_query($con,$checkUser);
		if(mysqli_num_rows($runCheckQuery)===1)
		{
		$getRow = mysqli_fetch_array($runCheckQuery);
		$getUser =  $getRow['Email'];
		}
		$newpassAuth = md5(sha1($cpass));
		$oldAuth = md5(sha1($getUser.$oldpass));
		$newAuth = md5(sha1($getUser.$cpass));
		if($CurrentUser==$oldAuth && $newpass==$cpass)
			{
				$updatePwd = "UPDATE login_system SET Password = '$newpassAuth', Authenticate = '$newAuth' WHERE Email = '$getUser'";
				$runQuery = mysqli_query($con,$updatePwd);
				if($runQuery==true)
				{	
					
					
					setcookie("CurrentUser","",time()-(86400*7));
					setcookie("CurrentUser",$newAuth,time()+(86400*7));
					
					if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
					 {
						 $user = $_COOKIE['username'];
						 $upass = $_COOKIE['password'];
						 setcookie("username","",time()-(86400*7));
						 setcookie("password","",time()-(86400*7));
						 setcookie("username",$getUser,time()+(86400*7));
						 setcookie("password",$cpass,time()+(86400*7));
					 }
					header("location:changePwd.php?changed");
				}
				
			}
			else if($CurrentUser!=$oldAuth)
			{
				header("location:changePwd.php?wrong_pass");
			}
			else if($newpass!=$cpass)
			{
				header("location:changePwd.php?notmatch");
			}
			 
 
 ?>