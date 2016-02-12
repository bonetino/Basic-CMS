<?php
	function sec_session(){
		$session_name 		= "manage_connectin_big_empty_trash";
		$session_secure 	= false;
		$session_http_only 	= true;
		$cookie_prams 		= session_get_cookie_params();

		session_set_cookie_params(
			$cookie_prams["lifetime"],
			$cookie_prams["path"],
			$cookie_prams["domain"],
			$session_secure,
			$session_http_only
		);

		session_start();
		session_regenerate_id(true);
	}

	function set_session($id){
		$_SESSION['browser'] 	= $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['id'] 		= $id;
	}

	function is_session_set($broj){
		if($broj === 1)
				$put = '../';
			else if($broj === 2)
				$put = '../../';
			else if($broj === 3)
				$put = '../../../';
			else
				$put = '';
		if(isset($_SESSION['id'], $_SESSION['browser'])){
			check_session($put);
		} else {
			header('Location: '.$put);
			die();
		}
	}

	function check_session(){
		if($_SESSION['browser'] === $_SERVER['HTTP_USER_AGENT']){
			$user_id = $_SESSION['id'];
		} else {
			header('Location: '.$put);
			die();
		}
	}

	function logout(){
		$_SESSION 		= array();
		$cookie_prams 	= session_get_cookie_params();
		setcookie(
			session_name(),
        	'', 
        	time() - 42000, 
	        $params["path"], 
	        $params["domain"], 
	        $params["secure"], 
	        $params["httponly"]
	    );
	    session_destroy();
	    header('Location: ../../');
	    die();
	}
?>