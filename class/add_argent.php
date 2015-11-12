<?php

include_once 'class/sql.php';


/**
 * Changer le montant disponible dans le porte monnaie de l'utilisateur
 */
class add_argent extends sql {

	private $id;
	private $montant;
	
	/**
	 * Initialisation des variables
	 */
	function __construct($montant, $id) {
	    parent::__construct();
		$this->montant  = $montant;
		$this->id  = $id;
	}
	
	/**
	 * Requête pour ajouter de l'argent à un user
	 */
	public function req_update() {
		$this->dbh->query('UPDATE user SET argent_user = argent_user + "'.$this->montant.'" WHERE id_user = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}

	/**
	 * Requête pour soustraire de l'argent à un user
	 */
	public function req_soustraire() {
		$this->dbh->query('UPDATE user SET argent_user = "'.$this->montant.'" WHERE id_user = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}
}

?>
