<?php include('signup-inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Logare</h2>
	</div>
	
	<form  method="POST" action="login.php">
		<!-- Afisare erori-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Nume utilizator</label>
			<input type="text" name="uname">
		</div>
		<div class="input-group">
			<label>Parolă</label>
			<input type="password" name="pass">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Logare</button>
		</div>
		<div class="input-group">
		<input type="button" value="Home" onclick="window.location.href='index.php'" />
		</div>
	</form>

</body>
</html>