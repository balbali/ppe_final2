<?php

class paiement_ctrl {

	private $argent;
	private $cout;
	private $erreur_paiement = false;

	/**
	 * Payer la reservation de l'utilisateur
	 */
	public function payer() {
		if(isset($_POST['payer'])) {
			$now = $this->argent - $this->cout;
			if($now >= 0) {
				include_once 'class/add_argent.php';
				$soustraire = new add_argent($now, $_SESSION['id']);
				$soustraire->req_soustraire();
				include_once 'class/update_paye.php';
				$up = new update_paye(intval($_GET['id']));
				$up->req_update();
				header('Location: interface.php');
			}
			else
			{
				$this->erreur_paiement = true;
			}
		}
	}

	/**
	 * Vérifier si l'user a lieu d'être sur cette page
	 */
	public function verif() {
		$id = intval($_GET['id']);
		if(!empty($id) and is_numeric($id)) {
			include_once 'class/info_reserv_paye.php';
			$info = new info_reserv_paye($id, $_SESSION['id']);
			$info->req_result();
			$result = $info->get_result();
			// Savoir si la reservation appartient bien à l'user
			if($result == 1) {
				include_once 'class/info_argent.php';
				$info = new info_argent($_SESSION['id']);
				$info->req_argent();
				$this->argent = $info->get_argent();
			}
			// SInon le renvoyer sur l'index
			else {
				header('Location: index.php');
			}
		}
		// Si l'id reservation n'est pas valide, on renvoie l'user sur l'index
		else {
			header('Location: index.php');
		}
	}

	/**
	 * Savoir si la reservation a déjà été payée
	 */
	public function deja_payee() {
		include_once 'class/info_paye.php';
		$info = new info_paye(intval($_GET['id']));
		$info->req_result();
		$result = $info->get_result();
		if($result == 1) {
			header('Location: interface.php');
		}
	}

	/**
	 * Savoir le cout d'une reservation
	 */
	public function infos_reserv() {
		include_once 'class/info_reserv.php';
		$info = new info_reserv(intval($_GET['id']));
		$info->req_cout();
		$this->cout = $info->get_cout();
	}

	/**
	 * Appel de la vue
	 */
	public function vue() {
		include_once 'v/paiement_vue.php';
	}

}
