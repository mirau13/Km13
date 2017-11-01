<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- login system and button -->
<header>
	<nav>
		<div class="main-frame">
			<ul>
				<li><a href="index.php">Acasă</a></li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout-inc.php" method="POST">
								<button type="submit" name="submit">Deconectare</button>
							</form>';
					} else{
						echo '<form action="includes/login-inc.php" method="POST">
								<input type="text" name="uname" placeholder="Nume utilizator/e-mail">
								<input type="text" name="pass" placeholder="Parolă">
								<button type="submit" name="submit">Autentificare</button>
							</form>
							<a href="signup.php">Înregistrare</a>';
					}
				?>	

			</div>
		</div>
	</nav>
</header>