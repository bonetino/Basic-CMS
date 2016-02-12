<?php

	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	sec_session();
	is_session_set(1);


	class Obrisi{

		private $post;

		public function __construct(){
			$this->post = urldecode(substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "obrisi") + 7));
			$this->korisnik();
		}

		public function korisnik(){
			global $con;
			$qu = "SELECT NULL FROM post WHERE korisnik = :korisnik AND id = :id ";
			$db = $con->prepare($qu);
			$db->execute(array(
				':korisnik' => $_SESSION['id'],
				':id'		=> $this->post
			));
			if($db->rowCount() === 1)
				$this->obrisi();
			else
				$this->prebaci();
		}

		private function obrisi(){
			global $con;
			$qu = "DELETE FROM post WHERE korisnik = :korisnik AND id = :id";
			$db = $con->prepare($qu);
			$db->execute(array(
				':korisnik' => $_SESSION['id'],
				':id'		=> $this->post
			));
			$this->prebaci();
		}

		private function prebaci(){
			header('Location: ../postovi/');
			die();
		}


	} new Obrisi;

	



?>