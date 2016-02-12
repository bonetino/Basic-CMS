<?php
	require_once("../lib/db.php");
	require_once("../lib/session.php");

	class Loging{

		private $korisnik, $lozinka;

		public function __construct(){
			if(!empty($_POST["korisnik"]) && !empty($_POST["lozinka"])){
				$this->korisnik = $_POST["korisnik"];
				$this->lozinka 	= $_POST["lozinka"];
				$this->uzmiPodatke();
			}  else
				echo 'Upišite sve potrebne podatke';
		}

		private function uzmiPodatke(){
			global $con;
			$query 	= "SELECT lozinka FROM korisnik WHERE korisnik = :korisnik";
			$sql 	= $con->prepare($query);
			$sql->execute(array(
				":korisnik" => $this->korisnik, 
			));
			if($sql->rowCount() === 1){	
				$row = $sql->fetch(PDO::FETCH_OBJ);
				$this->checkPassword($row);
			} else 
				echo 'Korisničko ime ne valja';
		}

		private function checkPassword($row){
			if(password_verify($this->lozinka, $row->lozinka))
				$this->setSession($this->korisnik);	
			else 
				echo 'Lozinka ne valja';
		}

		private function setSession($id){
			sec_session();
			set_session($id);
			header('Location: ../../pocetna/');
			die();
		}

	} new Loging;
?>