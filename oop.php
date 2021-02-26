  <?php 
	session_start();
	require_once('config.php');
	require_once('oop_function.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adding two numbers using PHP OOP</title>
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
			<div class="card">
				<div class="card-body bg-info">
				<form method="POST">
					<label>First number : </label><br>
					<input type="number" name="num1"><br>
					<label>Second number : </label><br>
					<input type="number" name="num2"><br><br>
					<input type="submit" name="submitBtn" value="Calculate" class="btn btn-danger">
				</form><br>
				<?php 
					if(isset($_POST['submitBtn']))
					{
						$num1 = $_POST['num1'];
						$num2 = $_POST['num2'];
						
						if(empty($num1) or empty($num2))
						{
							echo "<span class='alert alert-danger'>All fields are required!</span>";
						}
						else
						{
							echo "First number is $num1 <br> Second number is $num2<br><hr>";
							$ob = new calculation();
							$ob->add($num1,$num2);
							$ob->sub($num1,$num2);
							$ob->mul($num1,$num2);
							$ob->div($num1,$num2);
							$ob->mod($num1,$num2);
							
						}
					}
				?>
				</div>
				
			</div>
		</div>
	</body>
</html>