<?php
	include_once 'header.php';
?>

<!-- content for frontpage -->
<section class="main-cont">
	<div class="main-frame">
		<h2>Înregistrare</h2>
		<form class="signup-form" action="includes/signup-inc.php" method="POST">
			<input type="text" name="first"  placeholder="Prenume">
			<input type="text" name="last"  placeholder="Nume">
			<input type="text" name="email"  placeholder="E-mail">
			<input type="text" name="uname"  placeholder="Nume utilizator">
			<input type="password" name="pass"  placeholder="Parolă">
			<button type="submit" name="submit">Înregistrare</button>
		</form>
	</div>
</section>

</body>
</html>