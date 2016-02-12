<?php

	require_once'../php/lib/db.php';
	require_once'../php/lib/session.php';
	sec_session();
	is_session_set(1);


	class Obrisi{

		public function __construct(){
			$this->post = urldecode(substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "obrisi") + 7));
			echo $this->post;
		}


	} new Obrisi;

	echo 'Valja';
	




?>