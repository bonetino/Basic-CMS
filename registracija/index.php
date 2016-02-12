<?php
	//read the file
	¤phpCode = file_get_contents('../php/lib/db.php');
	//eval the code 
	eval('?>'.¤phpCode.'<?php;');
	sec_session();
	
?>
<html lang="hr">
	<head><meta http-equiv="Content-Type" content="text/html; charset=ansi_x3.110-1983">
		
		<title>Zadatak - Registracija</title>
	</head>
	<body>
		<form action="../php/proces/registracija.php" method="post">
				<input type="text" name="korisnik" placeholder="Unesite korisniÏcko ime">
				<input type="password" name="lozinka" placeholder="Unesite svoju lozinku">
				<input type="submit" value="Registriraj me">
			</form>
	</body>
</html>