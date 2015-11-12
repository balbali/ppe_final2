<?php

include_once 'class/sql.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of info_user
 *
 * @author romain
 */
class info_user extends sql {
    
	private $id;
	private $nom;
	private $mdp;
	private $permission;
	
	/**
	 * Initialisation des variables
	 */
	function __construct($nom, $mdp) {
        parent::__construct();
		$this->nom = $nom;
		$this->mdp = $mdp;
	}
	
	/**
	 * Obtenir l'id d'un user en fonction de son nom et d eson mot de passe
	 */
	public function req_id() {
		$req = $this->dbh->query('SELECT id_user FROM user WHERE email_user = "'.$this->nom.'" AND mdp_user = "'.$this->mdp.'"') or die(print_r($this->dbh->errorInfo()));
		$this->id = $req->fetch();
		$this->id = $this->id['id_user'];
	}
	
	/** 
	 * Savoir si l'utilisateur à la permission des admins
	 */
	public function req_permission() {
		$req = $this->dbh->query('SELECT id_user FROM user WHERE email_user = "'.$this->nom.'" AND mdp_user = "'.$this->mdp.'" AND rang_user = 1') or die(print_r($this->dbh->errorInfo()));
		$this->permission = $req->rowCount();
	}
	
	/**
	 * Retourne l'id
	 * @return int
	 */
	public function get_id() {
		return $this->id;
	}
	
	/**
	 * Retourne un booléen
	 * @return boolean
	 */
	public function get_permission() {
		return $this->permission;
	}
}

?>
