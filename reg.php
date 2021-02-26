
<!DOCTYPE html>
<html>
	<head>
		<title>User Registration</title>
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
			<div class="card" style="width:35%">
				<div class="card-header">
					 <h4 style="font-weight:bold; color:red"> User Registration</h4>
				</div>
				<div id="message"></div>
				<div class="card-body">
					<form>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name..."required>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address..."required>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-phone"></i></span>
							</div>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your contact number..."required maxlength="11">
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your password..." required>	
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control" id="cpass" name="cpass" placeholder="Enter your confirm-password..." required>
						</div>
						<br>
							<input type="button" class="btn btn-primary form-control" id="regBtn" name="regBtn" value="Register"><br>
						<br>
						<input type="reset" class="btn btn-secondary" id="reset" name="resetBtn" value="Reset"><br>
						<br>
					</form>
				</div>	
				<div class="card-footer">
					<span  style="font-size:14px">Back to login page <a href="login.php"> Login</a></span>
				</div>											
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("#regBtn").click(function(){
					var name = $("#name").val();
					var email = $("#email").val();
					var phone = $("#phone").val();
					var pass = $("#pass").val();
					var cpass = $("#cpass").val();
						if($.trim(name).length > 0 && $.trim(email).length > 0 && $.trim(phone).length > 0 && $.trim(pass).length > 0 && $.trim(cpass).length > 0)
						{
							$.ajax({
								
								method : "post",
								url : "reg_core.php",
								data :{name:name,email:email,phone:phone,pass:pass,cpass:cpass},
								success : function(data)
								{
									if(data)
									{
										$("#message").html(data);
									}
								}
								
							});
							
						}
						else {$("#message").html("<b style='color:red'>All filled are required!<b>");}
					
				});
				
				
			});
		
		</script>
	</body>
</html>