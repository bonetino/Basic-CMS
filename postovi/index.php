<?php
	ob_flush();
	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	sec_session();
	class Postovi{

		public function __construct(){
			$this->database();
			$qu = "SELECT * FROM post ORDER BY id DESC LIMIT 20";
			$db = $this->db->prepare($qu);
			$db->execute();
			$this->display($db->fetchAll());
		}

		private function database(){
			global $con;
			$this->db = $con;
		}

		private function display($rez){
			foreach($rez as $row){ ?>

				<div class="post">
					<?php $this->options($row);?>
					<h2><?php echo $row['naslov'];?></h2>
					<h3>Objavio <?php echo $row['korisnik'];?>, <?php echo $row['datum']?> u <?php echo $row['vrijeme'];?></h3>
					<p><?php echo $row['tekst'];?></p>
					<?php
						if(!empty($row['slika'])){ ?>
							<img src="../upload/<?php echo $row['slika'];?>">
						<?php
						}
					?>
				</div>
			<?php
			}
		}

		private function options($row){
			if(isset($_SESSION['id']) && $_SESSION['id'] === $row['korisnik']){ ?>
				<div class="options">
					<a href="../obrisi/<?php echo $row['id'];?>">Obriši</a>
					<a href="../uredi/<?php echo $row['id'];?>">Uredi</a>
				</div>
			<?php
			}

		}

	} 
?>
<html lang="hr">
	<head>
		<meta charset="UTF-8">
		<title>Zadatak - Postovi</title>
		<link rel="stylesheet" href="../style/css/default.css">
		<link rel="stylesheet" href="../style/css/postovi.css">
	</head>
	
	<div id="glavo">
		<center><h1>Zadnjih 20 postova</h1></center>
		<?php new Postovi;?>
	</div>
</html>