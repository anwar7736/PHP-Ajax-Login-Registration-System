<?php 
	session_start();
	if(isset($_COOKIE['CurrentUser']))
	{
		header("location:index.php");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Password Recover</title>
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
			<div class="card" style="width:37%">
				<div class="card-header">
					<div id="message"></div>
					 <h4 style="font-weight:bold; color:red"> Password Recover</h4>
				</div>
				<div class="card-body">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" name="user" id="user" placeholder="Enter your email address..."required>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your new password..." required>	
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="cpass" id="cpass" placeholder="Re-type your new password..." required>
						</div>
						<br>
							<input type="submit" class="btn btn-info form-control" name="recBtn" id="recBtn" value="Recover"><br>
						<br>
				</div>	
				<div class="card-footer">
					<span  style="font-size:14px">Back to login page <a href="login.php"> Login</a></span>
				</div>											
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("#recBtn").click(function(){
					var user = $("#user").val();
					var pass = $("#pass").val();
					var cpass = $("#cpass").val();
					if($.trim(user).length > 0 && $.trim(pass).length > 0 && $.trim(cpass).length > 0)
					{
						$.ajax({
							method:"post",
							url:"passrec_core.php",
							data:{user:user,pass:pass,cpass:cpass},
							success : function(data)
							{
								if(data)									
									{
										$("#message").html(data);
									}
							}
							
						});
						
					}
					else
					{
						$("#message").html("<b style='color:red'>All filled are required!<b>");
					}
					
					
				});
				
			});
		
		</script>
	</body>
</html>