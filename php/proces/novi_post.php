<?php
	require_once'../lib/db.php';
	require_once'../lib/session.php';
	require_once'../lib/text.php';
	sec_session();
	is_session_set(1);

	class Nova_sadrzaj{

		private $db, $naslov, $sadrzaj, $slika, $imeSlike;

		public function __construct(){
			if(!empty($_POST['naslov']) && !empty($_POST['sadrzaj']))
				$this->unesi();
			else
				echo 'Naslov i sadržaj posta su obavezni';
		}

		private function sendMessage($a){
			header('Location: ../../novi_post/?m='.$a);
			die();
		}

		private function database(){
			global $con;
			$this->db = $con;
		}

		private function unesi(){
			$this->database();
			$this->naslov 		= messageToDb($_POST['naslov']);
			$this->sadrzaj 		= messageToDb($_POST['sadrzaj']);
			$this->provjeriSliku();
		}

		private function provjeriSliku(){
			if(!empty($_FILES['slika']['name'])){
				$this->slika = $_FILES['slika'];
				$this->velicinaSlike();
			}
			else
				$this->sadrzaj();
		}

		private function velicinaSlike(){
			echo $this->slika['size'];
			if($this->slika['size'] > 0 || $this->slika['size'] < 104857600)
				$this->provjeriEkstenziju();
			else 
				$this->sendMessage('velicina');
		}

		private function provjeriEkstenziju(){
			$ext 		= pathinfo($this->slika['name'], PATHINFO_EXTENSION);
			$dozvoljeno = array('png', 'jpg', 'gif', 'PNG', 'JPG', 'GIF');
			if(in_array($ext, $dozvoljeno))
				$this->uploadSlike($ext);
			else 
				$this->sendMessage('nastavak');
		}

		private function uploadSlike($ext){
			$this->imeSlike = uniqid('', true).'.'.$ext;
			if(move_uploaded_file($this->slika['tmp_name'], '../../upload/'.$this->imeSlike))
				$this->sadrzajSlika();
			else
				$this->sendMessage('upload');
		}

		private function sadrzajSlika(){
			$qu = "INSERT INTO post (korisnik, naslov, tekst, datum, vrijeme, slika) VALUES (:korisnik, :naslov, :tekst, :datum, :vrijeme, :slika)";
			$db = $this->db->prepare($qu);
			$db->execute(array(
				':korisnik' 	=> $_SESSION['id'],
				':naslov' 		=> $this->naslov,
				':tekst' 		=> $this->sadrzaj,
				':datum' 		=> date('d.m.Y.'),
				':vrijeme' 		=> date('H:i'),
				':slika' => $this->imeSlike
			));
			$this->sendMessage('objava');
		}

		private function sadrzaj(){
			$qu = "INSERT INTO post (korisnik, naslov, tekst, datum, vrijeme) VALUES (:korisnik, :naslov, :tekst, :datum, :vrijeme)";
			$db = $this->db->prepare($qu);
			$db->execute(array(
				':korisnik' 	=> $_SESSION['id'],
				':naslov' 		=> $this->naslov,
				':tekst' 		=> $this->sadrzaj,
				':datum' 		=> date('d.m.Y.'),
				':vrijeme' 		=> date('H:i')
			));
			$this->sendMessage('objava');
		}

	} new Nova_sadrzaj;


?>