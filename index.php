<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="login_form">
		<form method="POST" action="">
			<input type="text" name="username" placeholder="USERNAME">
			<input type="password" name="password" placeholder="PASSWORD">
			<input type="submit">
		</form>

		<?php
			
			if(isset($_POST['username']))
			{
				$username = $_POST['username'];
				$password =	$_POST['password'];
				if($username !== "admin" && $password !== "admin"){

		?>
			<p>username or password is incorrect!</p>
		<?php
				}
			
			else{
				$_SESSION['auth'] = true;
				header("Location: table.php");

		?>
		<?php
				}
			}
		?>

	</div>

</body>
<style>
	body{
		position: relative;
		height: 100vh
	}
	.login_form{
		height:40%;
		width: 40%;
		position: absolute;
		top: 50%;
		left: 50%;
		transform:translate(-50%,-50%);
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		background-color: gray;
	}
	form{
		display: flex;
		flex-direction: column;
	}
	form input[type=text],input[type=password]{
		width: 500px;
		height: 50px;
	}
</style>
</html>