<?php
	
	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	require_once'../php/lib/text.php';
	sec_session();
	is_session_set(1);


	class Uredi{

		public function __construct(){
			$this->post = urldecode(substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "uredi") + 6));
			$this->korisnik();
		}

		public function korisnik(){
			global $con;
			$qu = "SELECT * FROM post WHERE korisnik = :korisnik AND id = :id LIMIT 1";
			$db = $con->prepare($qu);
			$db->execute(array(
				':korisnik' => $_SESSION['id'],
				':id'		=> $this->post
			));
			if($db->rowCount() === 1){
				echo 'Ima';
				$this->display($db->fetch(PDO::FETCH_OBJ));
			}
			else
				$this->prebaci();
		}

		private function prebaci(){
			header('Location: ../postovi/');
			die();
		}

		private function display($rez){ ?>
			<form method="post" action="../php/proces/uredi_post.php" enctype="multipart/form-data">
				<input type="text" name="naslov" placeholder="Upišite naslov posta" value="<?php echo $rez->naslov;?>">
				<br>
				<textarea name="sadrzaj" placeholder="Unesite teks"><?php echo messageFromDb($rez->tekst);?></textarea>
				<br>
				<input type="file" name="slika" accept="image/*" value="<?php echo $rez->slika;?>">
				<br>
				<p><input type="checkbox" name="obrisi">Obriši sliku</p>
				<input type="hidden" name="id" value="<?php echo $rez->id;?>"> 
				<input type="submit" value="Pošalji">
			</form>
		<?php
			$this->slika($rez->slika);
		}

		private function slika($sl){
			if(isset($sl)){ ?>
				<h3>Trenutna slika</h3>
				<div id="img">
					<img src="../upload/<?php echo $sl;?>">
				</div>
			<?php
			}
		}

	}
	




?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Uredi post</title>
	</head>
	
	<div id="glavo">
		<?php $uredi = new Uredi;?>
	</div>
</html>
