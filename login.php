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
		<title>Admin Login</title>
		<meta charset= "UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<style>
			#hide1 {
				display:none;
			}
			
		</style>
	</head>
	<body>
	<br>
	<br>
		<div class="container" align="center">
			<div class="card" style="width:30%">
				<div class="card-header">
					 <h3 style="font-weight:bold; color:red"><span style="color:#F89C0E; font-size:25px"><i class="fa fa-key"></i></span> Admin Login</h3>
				</div>
				<div class="card-body">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" id="user" name="user" placeholder="Enter your email address..." value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>"required>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control" id="pass" name="pass" id="pass" placeholder="Enter your password..." value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"required>
							<span class="eye" onclick="Function()">
								<i id="hide1" class="fa fa-eye m-2"></i>
								<i id="hide2" class="fa fa-eye-slash m-2"></i>
							</span>
						</div>	
						<br>
							<input type="checkbox" name="remind" id="remind"<?php if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){?> checked <?php } ?> > Remember me<br><br>
							<input type="button" class="btn btn-success form-control" id="loginBtn" name="loginBtn" value="LOGIN"><br>
							<br>
						<div id="wrong">
							
						</div>			
				</div>	
				<div class="card-footer">
					<a href="passrec.php" style="font-size:14px">Forgotten password?</a><br>
					<span  style="font-size:14px">Not yet a registered<a href="reg.php"> Signup</a></span>
				</div>											
			</div>
		</div>
		<script>
			function Function()
			{
				var x = document.getElementById('pass');
				var y = document.getElementById('hide1');
				var z = document.getElementById('hide2');
				if(x.type==='password')
				{
					x.type = 'text';
					y.style.display = 'block';
					z.style.display = 'none';
				}
				else
				{
					x.type = 'password';
					y.style.display = 'none';
					z.style.display = 'block';
				}
				
			}
			$(document).ready(function(){
				
				$("#loginBtn").click(function(){
					var user = $("#user").val();
					var pass = $("#pass").val();
					if($("#remind").prop("checked")==true)
					{
					var remind = $("#remind").val();
					}
					if(user=="" & pass=="")
					{
						$("#wrong").html("<b style='color:red'>Username & Password are required!</b>");
					}
					else if(user=="")
					{
						$("#wrong").html("<b style='color:red'>Username is required!</b>");
					}
					else if(pass==""){						
						$("#wrong").html("<b style='color:red'>Password is required!</b>");
					}	
					if($.trim(user).length > 0 && $.trim(pass).length > 0)
						{
							$.ajax({
								method: "post",
								url: "login_core.php",
								data:{user:user,pass:pass,remind:remind},
								success: function(data)
									{
										if(data)										
											{
												$("body").load("index.php").hide().fadeIn(1500);
											}
										else{
												$("#wrong").html("<b style='color:red'>Username or Password wrong!</b>");
											}
									}
									
							});
						}
				});
				
			});
		
		</script>
	</body>
</html>