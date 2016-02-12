<?php
	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	sec_session();
	is_session_set(1);

	class Message{

		public function __construct(){
			if(isset($_GET['m']))
				$message = $this->message();
			else
				$message = 'Napiši novi post';
			echo $message;
		}

		private function message(){
			if(($_GET['m']) === 'nastavak')
				$message = 'Nastavak slike nije dozvoljen';
			else if(($_GET['m']) === 'velicina')
				$message = 'Veličina slike je prevelika';
			else if(($_GET['m']) === 'upload')
				$message = 'Došlo je do nezgode, sliku nije bilo moguće uploudati na server';
			else if(($_GET['m']) === 'objava')
				$message = 'Post je uspješno objavljen';
			else
				$message = 'Napiši novi post';
			return $message;
		}

	}
?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Zadatak - Novi post</title>
		<link rel="stylesheet" href="../style/css/bootstrap.min.css">
		<link rel="stylesheet" href="../style/css2/post.css">
	</head>
	
	<div id="glavo">
		<h1><?php new Message;?></h1>
		<form method="post" action="../php/proces/novi_post.php" enctype="multipart/form-data">
		 	<div id="content">
				<div class="col-xs-3">
					<input type="text" name="naslov" placeholder="Upišite naslov posta" class="form-control">
				</div>
				<textarea name="sadrzaj" placeholder="Unesite teks" class="form-control" rows="3"></textarea>
				<input type="file" name="slika" accept="image/*">
				<br> 
				<input type="submit" value="Pošalji">
			</div>
		</form>
	</div>
</html>