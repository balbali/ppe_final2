<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Modifier les infos user
 *
 * @author romain
 */
class update_user extends sql {
    
	private $id;
	private $nom;
	private $prenom;
	private $email;
	
	/**
	 * Initialisation des variables
	 * @param int $id
	 */
	function __construct($id, $nom, $prenom, $email) {
	    parent::__construct();
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
	}
	
	/**
	 * Requête pour modifier un user
	 */
	public function req_update() {
		$this->dbh->query('UPDATE user SET nom_user = "'.$this->nom.'", prenom_user = "'.$this->prenom.'", email_user = "'.$this->email.'" WHERE id_user = '.$this->id.'') or die(print_r($this->dbh->errorInfo()));
	}
}

?>
