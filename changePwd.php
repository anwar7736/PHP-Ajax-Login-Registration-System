 <?php 
	session_start();
	require_once('config.php');
	if(!isset($_COOKIE['CurrentUser']))
	{
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<meta charset= "UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<style>
			
			
			
		</style>
	</head>
	<body>
	<br>
	<br>
		<div class="container" align="center">
			<div class="card" style="width:45%">
				<div class="card-header">
					 <h3 style="font-weight:bold; color:red"><span style="color:#F89C0E; font-size:25px"><i class="fa fa-key"></i></span> Change Password</h3>
				</div>
				<div class="card-body">
					<div id="wrong">
						
					</div>
					<?php 
						if(isset($_REQUEST['changed']))
						{
							echo "<b class='alert alert-success'>Password changed successfully!</b>";
						}
						else if(isset($_REQUEST['wrong_pass']))
						{
							echo "<b class='alert alert-danger'>Old password did not match!</b>";
						}
						else if(isset($_REQUEST['notmatch']))
						{
							echo "<b class='alert alert-danger'>New password & confirm password did not match!</b>";
						}
					
					?>
					<br><br>
					<form method="POST" action="change_core.php">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="text" class="form-control" id="opass" name="opass" placeholder="Enter your old password..." required><span style='color:red; margin-left:4px; font-size:18px'>*</span>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="text" class="form-control" id="npass" name="npass" placeholder="Enter your new password..." required><span style='color:red; margin-left:4px; font-size:18px'>*</span>
						</div><br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							
							<input type="text" class="form-control" id="cpass" name="cpass" placeholder="Enter your confirm password..." required><span style='color:red; margin-left:4px; font-size:18px'>*</span>
						</div>	
						<br>
							<input type="submit" class="btn btn-success form-control" id="uPwd" name="uPwd" value="Update"><br>
							<br>
					</form>	
				</div>	
				<div class="card-footer">	
					<a href='index.php' style='text-decoration:none'>Back to Home page</a>
				</div>											
			</div>
		</div>
		<script>
		$(document).ready(function(){
				
				$("#uPwd").click(function(){
					var oldPwd = $("#opass").val();
					var newpass = $("#npass").val();
					var cpass = $("#cpass").val();
					if(oldPwd=="" & newpass=="" & cpass=="")
					{
						$("#wrong").html("<b style='color:red'>All fields are required!</b>");
					}
					else if(oldPwd=="")
					{
						$("#wrong").html("<b style='color:red'>Old password is required!</b>");
					}
					else if(newpass==""){						
						$("#wrong").html("<b style='color:red'>New password is required!</b>");
					}	
					else if(cpass==""){						
						$("#wrong").html("<b style='color:red'>Confirm password is required!</b>");
					}	
				});
				
			});
		</script>
		
	</body>
</html>