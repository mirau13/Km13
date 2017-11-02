<?php include('signup-inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- content for frontpage -->
	<div class="header">
		<h2>Înregistrare</h2>
	</div>
	
	<form  method="POST" action="inregistrare.php">
		<!-- Afisare erori-->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Prenume</label>
			<input type="text" name="first" value="<?php echo $first; ?>">
		</div>
		<div class="input-group">
			<label>Nume</label>
			<input type="text" name="last" value="<?php echo $last; ?>">
		</div>
		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="email">
		</div>
				<div class="input-group">
			<label>Nume utilizator</label>
			<input type="text" name="uname">
		</div>
		<div class="input-group">
			<label>Parolă</label>
			<input type="password" name="pass">
		</div>
		<div class="input-group">
			<button type="submit" name="submit" class="btn">Înregistrare</button>
		</div>
	</form>

</body>
</html>