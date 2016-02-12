<?php
	require_once'../lib/session.php';
	require_once'../lib/db.php';
	sec_session();

	class Registracija{

		private $db, $korisnik, $lozinka, $lozinka_hash;

		public function __construct(){
			if(!empty($_POST['korisnik']) && !empty($_POST['lozinka']))
				$this->pretvoriPodatke();
			else
				echo 'Unesite sva potrebna polja';
		}

		private function db(){
			global $con;
			$this->db = $con;
		}

		private function pretvoriPodatke(){
			$this->db();
			$this->korisnik 	= $_POST['korisnik'];
			$this->lozinka 		= $_POST['lozinka'];
			$this->provjeraImena();
		}

		private function provjeraImena(){
			$qu = "SELECT NULL FROM korisnik WHERE korisnik = :ime LIMIT 1";
			$db = $this->db->prepare($qu);
			$db->execute(array(
				':ime' => $this->korisnik
			));
			if($db->rowCount() === 0)
				$this->provjeriLozinku();
			else
				echo 'Korisničko ime je zauzeto, odaberite drugo';
		}

		private function provjeriLozinku(){
			if(strlen($this->lozinka) >= 6)
				$this->hashirajLozinku();
			else
				echo 'Lozinka mora imati najmanje 6 znakova';
		}

		private function hashirajLozinku(){
			$crypt = array('cost' => 15);
			$this->lozinka_hash = password_hash($this->lozinka, PASSWORD_BCRYPT, $crypt);
			echo '<pre>', print_r($this), '</pre>';
			$this->unesiKorisnika();
		}

		private function unesiKorisnika(){
			$query = "INSERT INTO korisnik (korisnik, lozinka) VALUES (:ime, :lozinka)";
			$sql = $this->db->prepare($query);
			$sql->execute(array(
				':ime' 			=> $this->korisnik,
				':lozinka' 		=> $this->lozinka_hash
			));
			$this->login();
		}

		private function login(){
			set_session($this->korisnik);
			header('Location: ../../pocetna/');
			die();
		}

	} new Registracija;
?>