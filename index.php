<?php 
	require_once'php/lib/session.php';
	sec_session();
	
?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Zadatak - Početna</title>
		<link rel="stylesheet" href="css/default.css">
	</head>
	<body>
		<form action="php/proces/prijava.php" method="post">
			<input type="text" name="korisnik" placeholder="Unesite korisničko ime">
			<input type="password" name="lozinka" placeholder="Unesite svoju lozinku">
			<input type="submit" value="Prijavi me">
		</form>
		<center><a href="registracija">Registracija!</a></center>
	</body>
</html>