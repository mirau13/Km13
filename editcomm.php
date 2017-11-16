<?php
	include('comm-inc.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
			<title>Modificare comentariu</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />	
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>			
	</head>
	<body>
			<article id="contact">						
								<h2 class="major">Recenzii</h2>								
								<?php
								$commid = $_POST['commid'];
								$user_id = $_POST['user_id'];
								$date = $_POST['date'];
								$message = $_POST['message'];
								
								echo "<form method='POST' action='".editeazaComentarii($conn)."'>
									<input type='hidden' name='user_id' value='".$user_id."'>
									<input type='hidden' name='commid' value='".$commid."'>
									<input type='hidden' name='date' value='".$date."'>
									<div class='field half first'>
										<label for='name'>Name</label>
										<input type='text' name='name' id='name' />
									</div>
									<div class='field half'>
										<label for='email'>Email</label>
										<input type='text' name='email' id='email' />
									</div>
									<div class='field'>
										<label for='message'>Message</label>
										<textarea style='resize:none' name='message'>".$message."</textarea>
									</div>
									<ul class='actions'>
										<button type='submit' name='commSubmit'>Editează</button>
									</ul>
								</form>";
								?>
							</article>
	</body>
</html>