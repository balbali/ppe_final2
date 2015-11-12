<?php

class argent_ctrl {

	private $argent;
	private $erreurajout = false;

	public function form() {
		
		
			if(isset($_POST['submit'])) {
				if (is_numeric($_POST['argent']) && $_POST['argent'] >= 1){
					include_once "class/add_argent.php";
					$add = new add_argent($_POST['argent'], $_SESSION['id']);
					$add->req_update();
				}
				else{
					$this->erreurajout = true;
				}

			}
		
		
	}
	/**
	* Retourne l'argent de l'user
	*/
	public function argent() {
		include_once "class/info_argent.php";
		$argent = new info_argent($_SESSION['id']);
		$argent->req_argent();
		$this->argent = $argent->get_argent();
	
	}

	/**
	* Appel de la vue
	*/
	public function vue() {
		include_once 'v/argent_vue.php';
	}

}
?>
