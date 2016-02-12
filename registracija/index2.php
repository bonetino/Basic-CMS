<?php 
var_dump(file_exists('../php/lib/session.php')); exit;
	require_once'../php/lib/session.php';
	sec_session();
	
?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Zadatak - Registracija</title>
	</head>
	<body>
		<form action="../php/proces/registracija.php" method="post">
				<input type="text" name="korisnik" placeholder="Unesite korisničko ime">
				<input type="password" name="lozinka" placeholder="Unesite svoju lozinku">
				<input type="submit" value="Registriraj me">
			</form>
	</body>
</html>