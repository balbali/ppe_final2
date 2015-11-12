<?php

include_once 'sql.php';

class requiert extends sql {
    
    function __construct() {
		parent::__construct();
		session_start();
    }
	
	public function acces() {
		// Savoir si l'user existe
		include_once 'class/info_user.php';
		$info = new info_user($_SESSION['email'], $_SESSION['mdp']);
		$info->req_id();
		$id = $info->get_id();

		if(empty($id)) {
			header('Location: index.php');
		}
	}
	
	public function admin() {
		// Savoir si c'est bien un administrateur qui rentre
		include_once 'class/info_user.php';
		$info = new info_user($_SESSION['email'], $_SESSION['mdp']);
		$info->req_permission();

		if($info->get_permission() != 1) {
			header('Location: refuse.php');
		}
	}

}
?>
