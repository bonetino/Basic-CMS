<?php
	function messageToDb($a){
		$a = htmlspecialchars($a);
		$a = str_replace("\n", "<br>", $a);
		$a = str_replace("\r", "", $a);
		return $a;
	}

	function messageFromDb($a){
		$a = str_replace("<br>", "\n", $a);
		return $a;
	}
?>

