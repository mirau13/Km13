<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		
		
	<!--	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function(){
         // Find any date inputs and override their functionality
         $('input[type="date"]').datepicker();
    });
</script> -->
		<title>Formular rezervare</title>
	</head>
	<body>	
		<form action="" method="POST">
			<fieldset>
				<legend>Detalii personale: </legend>
				<br>
				<input type="radio" name="gender" value="male" checked> Barbat<br>
				<input type="radio" name="gender" value="female"> Femeie<br>
				<input type="radio" name="gender" value="other"> Altul<br>
				<div class="input-group">
				<label for="name">Nume utilizator: </label><input type="text" name="username" placeholder="Nume utilizator">
				</div>
				<div class="input-group">
				<label for="loc">Localitatea: </label><input type="text" name="loc" placeholder="Localitate">	
				</div>
				<div class="input-group">
				<label for="phone">Numar telefon: </label><input type="tel" name="phone" id="phone" required placeholder="Numar telefon" pattern="[0-9]{4} [0-9]{3} [0-9]{3}" title="Introduceti numar de telefon in formatul #### ### ###">
				</div>
			</fieldset>
			<br>
			<fieldset>
				<legend>Detalii rezervare: </legend>
				<div class="input-group">
				<label for="date1">Data check in: </label><input type="date" name="date1" min="2017-11-15">
				</div>
				<div class="input-group">
				<label for="date2">Data check out: </label><input type="date" name="date2" min="2017-11-15">
				</div>
				<div class="input-group">
				<label for="nrAdulti">Numar adulti: </label><input type="number" name="nrAdulti" min="1" max="6">
				</div>
				<div class="input-group">
				<label for="nrCopii">Numar copii: </label><input type="number" name="nrCopii" min="0" max="6">
				</div>
				
				<p>Aveti rezervare telefonica?</p>
				<input type="radio" name="reztel" value="Da" checked> Am vorbit deja cu proprietarul la telefon.<br>
				<input type="radio" name="reztel" value="Nu"> Nu am vorbit inca cu proprietarul la telefon.
				<br>
			</fieldset>
			<div class="input-group">
			<button type="submit" name="submitrez" class="btn">Rezervare</button>
			</div>
	</body>
</html>