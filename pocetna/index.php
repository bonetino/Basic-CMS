<?php
	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	sec_session();
	is_session_set(1);
?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Zadatak - Početna</title>
	</head>
	
	<div id="glavo">
		<h1>Dobrodošao korisniče <?php echo $_SESSION['id'];?></h1>
		<a href="../novi_post/">Napravi novi post</a>
	</div>
</html>